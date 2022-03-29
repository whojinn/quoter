<?php

declare(strict_types=1);

/*
 * Copyright 2022 whojinn

 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at

 *  http://www.apache.org/licenses/LICENSE-2.0

 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

require_once __DIR__.'/vendor/autoload.php';

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;
use Whojinn\Quoter\QuoterExtension;

$config = [];

$environment = new Environment($config);

$environment->addExtension(new CommonMarkCoreExtension())
            ->addExtension(new QuoterExtension());

$converter = new MarkdownConverter($environment);

$markdown = ">常識とは、18歳までに身に着けた偏見のコレクションのことである。\n>@アルベルト・アインシュタイン";

echo $converter->convert($markdown);
