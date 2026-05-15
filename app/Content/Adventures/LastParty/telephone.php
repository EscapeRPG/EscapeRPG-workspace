<?php

use App\Services\Adventures\Support\NarrativeText;

$text = static fn(string $section): string => NarrativeText::paragraphList("lastparty/telephone#{$section}")[0] ?? '';

return [
    'variants' => [
        'default' => [
            'audio' => null,
            'intro' => $text('default_intro'),
            'threads' => [
                [
                    'min_step' => 1,
                    'type' => 'incoming',
                    'speaker' => 'Axel',
                    'messages' => [
                        $text('default_axel_1'),
                        $text('default_axel_2'),
                        $text('default_axel_3'),
                    ],
                ],
                [
                    'min_step' => 2,
                    'type' => 'reply',
                    'messages' => [
                        $text('default_reply_1'),
                    ],
                ],
                [
                    'min_step' => 2,
                    'type' => 'incoming',
                    'speaker' => 'Axel',
                    'messages' => [
                        $text('default_axel_4'),
                    ],
                ],
                [
                    'min_step' => 3,
                    'type' => 'reply',
                    'messages' => [
                        $text('default_reply_2'),
                    ],
                ],
                [
                    'min_step' => 3,
                    'type' => 'incoming',
                    'speaker' => 'Axel',
                    'messages' => [
                        $text('default_axel_5'),
                    ],
                ],
            ],
            'conclusion' => [
                'min_step' => 3,
                'paragraphs' => NarrativeText::paragraphList('lastparty/telephone#default_conclusion'),
            ],
            'actions' => [],
        ],
        'after_faceeebook' => [
            'audio' => 'assets/sounds/lastparty/message.mp3',
            'intro' => $text('after_intro'),
            'threads' => [
                [
                    'min_step' => 0,
                    'type' => 'incoming',
                    'speaker' => 'Axel',
                    'messages' => [
                        $text('after_axel_1'),
                    ],
                ],
                [
                    'min_step' => 4,
                    'type' => 'reply',
                    'messages' => [
                        $text('after_reply_1'),
                    ],
                ],
                [
                    'min_step' => 4,
                    'type' => 'incoming',
                    'speaker' => 'Axel',
                    'messages' => [
                        $text('after_axel_2'),
                    ],
                ],
                [
                    'min_step' => 5,
                    'type' => 'reply',
                    'messages' => [
                        $text('after_reply_2'),
                    ],
                ],
                [
                    'min_step' => 5,
                    'type' => 'incoming',
                    'speaker' => 'Axel',
                    'messages' => [
                        $text('after_axel_3'),
                        $text('after_axel_4'),
                        $text('after_axel_5'),
                    ],
                ],
            ],
            'actions' => [],
        ],
    ],
];
