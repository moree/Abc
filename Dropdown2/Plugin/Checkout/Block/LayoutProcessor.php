<?php
namespace Abc\Dropdown2\Plugin\Checkout\Block;


class LayoutProcessor
{

    /**
     * LayoutProcessor constructor.
     *
     */
    public function __construct(
    ) {
    }

    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array $jsLayout
    ) {

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shippingAdditional'] = [
            'component' => 'uiComponent',
            'displayArea' => 'shippingAdditional',
            'children' => [
                'dropdown' => [
                    'component' => 'Abc_Dropdown2/js/view/dropdown-block',
                    'displayArea' => 'dropdown-block',
                    'deps' => 'checkoutProvider',
                    'dataScopePrefix' => 'dropdown',
                    'children' => [
                        'form-fields' => [
                            'component' => 'uiComponent',
                            'displayArea' => 'dropdown-block',
                            'children' => [
                                'dropdown' => [
                                    'component' => 'Abc_Dropdown2/js/view/dropdown',
                                    'config' => [
                                        'customScope' => 'dropdown',
                                        'template' => 'ui/form/field',
                                        'elementTmpl' => 'Abc_Dropdown2/fields/dropdown',
                                        'options' => [],
                                        'id' => 'dropdown',
                                    ],
                                    'dataScope' => 'dropdown.dropdown',
                                    'label' => 'Test Attr4',
                                    'provider' => 'checkoutProvider',
                                    'visible' => true,
                                    'validation' => false,
                                    'sortOrder' => 10,
                                    'id' => 'dropdown'
                                ]
                            ],
                        ],
                    ]
                ]
            ]
        ];

        return $jsLayout;
    }
}
