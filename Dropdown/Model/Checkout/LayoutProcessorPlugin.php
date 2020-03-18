<?php

namespace Abc\Dropdown\Model\Checkout;

/**
 * Class LayoutProcessorPlugin
 * @package Abc\Dropdown\Model\Checkout
 */
class LayoutProcessorPlugin
{

    protected $customerSession;

    public function __construct(\Magento\Customer\Model\Session $customerSession)
    {
        $this->customerSession = $customerSession;
    }

    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array  $jsLayout
    ) {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('Dropdown LayoutProcessorPlugin');

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children']['test_attr3'] = [
            'component' => 'Abc_Dropdown/js/view/dropdown',
            'config' => [
                'customScope' => 'shippingAddress',
                'template' => 'ui/form/field',
                'elementTmpl' => 'Abc_Dropdown/fields/dropdown',
                'options' => [],
                'id' => 'test-attr3',
                'dropdown' => [
                    [
                        'label' => 'Option 1',
                        'value' => 'option1',
                        'dropdown' => [
                            [
                                'label' => 'Option 11',
                                'value' => 'option11'
                            ],
                            [
                                'label' => 'Option 12',
                                'value' => 'option12'
                            ]
                        ]
                    ],
                    [
                        'label' => 'Option 2',
                        'value' => 'option2',
                        'dropdown' => [
                            [
                                'label' => 'Option 21',
                                'value' => 'option21'
                            ]
                        ]
                    ],
                    [
                        'label' => 'Option 3',
                        'value' => 'option3',
                        'dropdown' => [
                            [
                                'label' => 'Option 31',
                                'value' => 'option31'
                            ],
                            [
                                'label' => 'Option 32',
                                'value' => 'option32'
                            ]
                        ]
                    ]
                ],
            ],
            'dataScope' => 'shippingAddress.test_attr3',
            'label' => 'test_attr3',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => false, 
            'sortOrder' => 500,
            'id' => 'test-attr3'
        ];

        return $jsLayout;
    }
}
