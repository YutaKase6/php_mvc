<?php

/**
 * コントローラの抽象クラス。
 * 全てのコントローラの共通処理を記述する。
 */
abstract class AbstractController
{
    /**
     * viewまでのパス。
     */
    const VIEW_DIR = __DIR__ . '/../view';
    /**
     * libまでのパス。
     */
    const LIB_DIR = __DIR__ . '/../lib';
}
