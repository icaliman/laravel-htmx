<?php

namespace App\View\Components\Support\Features;

use Illuminate\Support\Facades\Blade;

trait HandlesPageComponents
{
    public string $layout = 'layouts.app';

    function __invoke()
    {
        return $this->renderPage();
    }

    public function renderPage()
    {
        $content = view($this->view, $this->data());
        $layoutConfig = (object) [
            'view' => $this->getLayout(),
            'params' => $this->layoutParams(),
            'slotOrSection' => $this->layoutSlotOrSection(),
        ];

        return Blade::render(<<<'HTML'
                    @extends($layout->view, $layout->params)

                    @section($layout->slotOrSection)
                        {!! $content !!}
                    @endsection
                HTML, [
            'content' => $content,
            'layout' => $layoutConfig,
        ]);
    }

    public function getLayout(): string
    {
        return $this->layout;
    }

    public function layoutParams(): array
    {
        return [];
    }

    public function layoutSlotOrSection(): string
    {
        return 'content';
    }
}
