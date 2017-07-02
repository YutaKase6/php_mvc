<?php

/**
 * コントローラの振り分け処理クラス
 */
class Dispatcher
{
    const DEFAULT_CONTROLLER_NAME = 'default';
    const DEFAULT_ACTION_NAME = 'default';
    const CONTROLLER_SUFFIX = 'Controller';
    const ACTION_SUFFIX = 'Action';
    const CONTROLLER_DIR_NAME = '/controller/';
    const PHP_EXTENSION = '.php';

    /**
     * @var string システムのルートディレクトリのパス。クラスのロードに用いる。
     */
    private $sysRoot;

    /**
     * Dispatcher constructor.
     * @param string $sysRoot システムのルートディレクトリのパス。
     */
    public function __construct($sysRoot)
    {
        $this->sysRoot = rtrim($sysRoot, '/');
    }

    /**
     * URLによってコントローラを振り分けるメソッド。
     */
    public function dispatch()
    {
        // パラメータ(URL)取得(末尾の/は削除)
        $param = preg_replace('~/?$~', '', $_SERVER['REQUEST_URI']);

        // パラメータを/で分割
        $params = array();
        if ($param != '') {
            $params = explode('/', $param);
        }

        // パラメータからコントローラのインスタンスを生成
        $controllerInstance = $this->newControllerInstance($params);

        // パラメータからメソッド名を取得し実行
        $actionMethod = $this->buildActionName($params, $controllerInstance);
        $controllerInstance->$actionMethod();
    }

    /**
     * パラメータからコントローラクラスのインスタンスを生成。
     * @param array $params パラメータ(URL)を / でスプリットしたリスト
     * @return mixed コントローラのインスタンス
     */
    private function newControllerInstance($params)
    {
        $controller = (count($params) > 1) ? $params[1] : self::DEFAULT_CONTROLLER_NAME;
        // アッパーキャメルに変換
        $className = ucfirst(strtolower($controller)) . self::CONTROLLER_SUFFIX;
        $fileName = $this->sysRoot . self::CONTROLLER_DIR_NAME . $className . self::PHP_EXTENSION;
        // 存在しないコントローラクラスの場合デフォルトを指定
        if (!file_exists($fileName)) {
            $className = ucfirst(strtolower(self::DEFAULT_CONTROLLER_NAME)) . self::CONTROLLER_SUFFIX;
            $fileName = $this->sysRoot . self::CONTROLLER_DIR_NAME . $className . self::PHP_EXTENSION;
        }
        require_once $fileName;
        return new $className;
    }

    /**
     * パラメータからメソッド名を形成。
     * @param array $params パラメータ(URL)を / でスプリットしたリスト
     * @param mixed $controllerInstance コントローラのインスタンス
     * @return string アクションに対応するメソッド名
     */
    private function buildActionName($params, $controllerInstance)
    {
        $action = (count($params) > 2) ? $params[2] : self::DEFAULT_ACTION_NAME;
        $actionMethod = $action . self::ACTION_SUFFIX;
        // 存在しないアクションの場合デフォルトを指定
        if (!method_exists($controllerInstance, $actionMethod)) {
            $actionMethod = self::DEFAULT_ACTION_NAME . self::ACTION_SUFFIX;
        }
        return $actionMethod;
    }
}
