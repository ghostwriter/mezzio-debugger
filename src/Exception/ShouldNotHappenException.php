<?php

declare(strict_types=1);

namespace Ghostwriter\MezzioDebugger\Exception;

use Ghostwriter\MezzioDebugger\Interface\ExceptionInterface;
use LogicException;

final class ShouldNotHappenException extends LogicException implements ExceptionInterface {}
