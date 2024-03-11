<?php

namespace App\View\Components\Support\Contracts;

use App\View\Components\Support\Traits;
use App\View\Components\Support\Features;
use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

abstract class HtmxComponent extends Component implements Htmlable, Responsable
{
    use Traits\Htmlable;
    use Traits\Responsable;
    use Traits\Makeable;
    use Features\HandlesPageComponents;

    public string $view = 'components.htmx';

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view($this->view, $this->data());
    }
}
