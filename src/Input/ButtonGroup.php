<?php

declare(strict_types=1);

namespace PHPForge\Html\Input;

/**
 * ButtonGroup renders a button group widget.
 *
 * For example,
 *
 * ```php
 * <?=
 *     ButtonGroup::create()
 *         ->buttons(
 *             Button::widget()->label('Submit')->type('submit'),
 *             Button::widget()->label('Reset')->type('reset')
 *         );
 * ?>
 * ```
 *
 * Pressing on the button should be handled via JavaScript. See the following for details:
 */
final class ButtonGroup extends Base\AbstractButtonGroup {}
