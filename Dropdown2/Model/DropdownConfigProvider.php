<?php
namespace Abc\Dropdown2\Model;

use Magento\Checkout\Model\ConfigProviderInterface;

class DropdownConfigProvider implements ConfigProviderInterface
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * DropdownConfigProvider constructor.
     *
     */
    public function __construct(
    ) {
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {

        return ['dropdown' => [
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
        ]
        ];

    }
}
