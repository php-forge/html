<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Enum;

enum DataAttributes: string
{
    case ACTION = 'data-action';
    case CANCEL_TEXT = 'data-cancel-text';
    case CONFIRM_TEXT = 'data-confirm-text';
    case DATA_DRAWER_TARGET = 'data-drawer-target';
    case DATA_DRAWER_TOGGLE = 'data-drawer-toggle';
    case ICON = 'data-icon';
    case METHOD = 'data-method';
    case MESSAGE = 'data-message';
    case TITLE = 'data-title';
}
