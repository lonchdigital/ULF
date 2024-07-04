<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MultilanguageInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly string $label,
        public readonly string $fieldName,
        public readonly ?array $values,
        public readonly ?string $fieldDisplay = '',
        public readonly ?string $placeholder = null,
        public readonly ?bool $isRequired = false,
    ) { }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $valuesToDisplay = [];
        if( $this->fieldDisplay ) {
            foreach ($this->values as $lang => $value) {
                $valuesToDisplay[$lang] = $value[$this->fieldDisplay];
            }
        } else {
            foreach ($this->values as $lang => $value) {
                $valuesToDisplay[$lang] = $value;
            }
        }

        return view('components.admin.multilanguage-input', [
            'label' => $this->label,
            'fieldName' => $this->fieldName,
            'fieldDisplay' => $this->fieldDisplay,
            'errorFieldName' => preg_replace(
                '(\.$)',
                '',
                preg_replace(
                    '(\]\[|\[|\])',
                    '.',
                    $this->fieldName
                )
            ),
            'valuesField' => $valuesToDisplay,
            'isRequired' => $this->isRequired,
            'placeholder' => $this->placeholder,
        ]);
    }
}
