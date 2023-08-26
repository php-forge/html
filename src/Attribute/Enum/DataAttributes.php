<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Enum;

enum DataAttributes: string
{
    case ACTION = 'data-action';
    case CANCEL_TEXT = 'data-cancel-text';
    case CONFIRM_TEXT = 'data-confirm-text';
    case DATA_COLLAPSE_TOGGLE = 'data-collapse-toggle';
    case DATA_DISMISS_TARGET = 'data-dismiss-target';
    case DATA_DRAWER_TARGET = 'data-drawer-target';
    case DATA_DRAWER_TOGGLE = 'data-drawer-toggle';
    case DATA_DROPDOWN_TOGGLE = 'data-dropdown-toggle';
    case ICON = 'data-icon';
    case MESSAGE = 'data-message';
    case METHOD = 'data-method';
    case TITLE = 'data-title';
}
