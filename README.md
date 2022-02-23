# Cashalot API


## Установка
``` 
composer require gavan4eg/cashalot
```
#### Обпуликовать config/cashalot.php
``` 
php artisan vendor:publish --provider="Gavan4eg\Cashalot\Providers\CashalotServiceProvider"
``` 

## Открытие смены:

```              
                'Command' => 'OpenShift',
                'NumFiscal' => '4000046373',
                'Certificate' => '',
                'PrivateKey' => '',
                'Password' => 'testplat2021',
```

## Выполнять преде открытием смены 1 раз:

```
                'Command' => 'TransactionsRegistrarState',
                'NumFiscal' => '4000046373',
                'Certificate' => '',
                'PrivateKey' => '',
                'Password' => 'testplat2021',
                'IncludeTaxObject' => true,
```

## Пример запроса на создание чека по карте в ПРРО

```
                'Command' => 'RegisterCheck',
                'Certificate' => '',
                'PrivateKey' => '',
                'Password' => 'testplat2021',
                'NumFiscal' => '4000046373',
                'Check' => [
                    "CHECKHEAD" => [
                        "DOCTYPE" => "SaleGoods",
                        "IPN" => "111111111111",
                        "DOCSUBTYPE" => "CheckGoods"
                    ],
                    "CHECKTOTAL" => [
                        "SUM" => 99.99
                    ],

                    "CHECKPAY" => [
                        [
                            "PAYFORMCD" => 1,
                            "PAYFORMNM" => "Банківська картка",
                            "SUM" => 99.99,
                            "PAYSYS" => [
                                [
                                    "TAXNUM" => "UA2020",
                                    "NAME" => "Bitcoin",
                                    "ACQUIREPN" => "12345",
                                    "ACQUIRENM" => "idk",
                                    "ACQUIRETRANSID" => "12345",
                                    "DEVICEID" => "12345",
                                    "EPZDETAILS" => "12345",
                                    "AUTHCD" => "12345",
                                    "SUM" => "99.99",
                                    "COMMISSION" => "0"
                                ]
                            ],
                        ],
                    ],

                    "CHECKTAX" => [
                        [
                            "TYPE" => 0,
                            "NAME" => "ПДВ",
                            "LETTER" => "А",
                            "PRC" => 20.00,
                            "TURNOVER" => 99.99,
                            "SOURCESUM" => 99.99,
                            "SUM" => 15.87]
                    ],

                    [
                        "TYPE" => 1,
                        "NAME" => "Акциз",
                        "LETTER" => "Г",
                        "PRC" => 5.00,
                        "TURNOVER" => 99.99,
                        "SOURCESUM" => 99.99,
                        "SUM" => 4.76
                    ],

                    "CHECKBODY" => [
                        [
                            "CODE" => "12312312",
                            "BARCODE" => "7890305",
                            "UKTZED" => "2905110000",
                            "NAME" => "Спирт твердий",
                            "UNITCD" => 138,
                            "UNITNM" => "л",
                            "AMOUNT" => 1.000,
                            "PRICE" => 99.99,
                            "LETTERS" => "АГ",
                            "COST" => 99.99
                        ]
                    ],
                ]
            ]
        ]);
```
## Описание:

> Сертефикат .crt и приват ключ .pfx должны быть в формате base64 (рессур для перевода https://www.base64encode.org/enc/certificate/)
#
> Открытие смены должно происходить в начале дня 00:01. Закртие смены лучше делать в 23:55 чтоб cashalot успел ответить, чеки на это время нужно ставить в очередь
#
> Важный момент, если вы работаете через API смена открыватся и закрыватся должна только через API, если смена открыта через программу Cashalot, чек создан через WEB API не будет
#
> !!! Смена должны открыватся и закрыватся каждый день, что бы избежать штрафных санкций !!!
