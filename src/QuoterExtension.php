<?php

declare(strict_types=1);

/**
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

namespace Whojinn\Quoter;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ConfigurableExtensionInterface;
use League\Config\ConfigurationBuilderInterface;
use Whojinn\Quoter\Node\CiteNode;
use Whojinn\Quoter\Parser\QuoterInlineParser;
use Whojinn\Quoter\Renderer\QuoterRenderer;

/**
 * commonmarkの引用文のための拡張機能。
 */
class QuoterExtension implements ConfigurableExtensionInterface
{
    public function configureSchema(ConfigurationBuilderInterface $builder): void
    {
    }

    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment
        ->addInlineParser(new QuoterInlineParser(), 100)
        ->addRenderer(CiteNode::class, new QuoterRenderer(), 100);
    }
}
// pacstrap /mnt base linux-hardened sudo lvm2 vim zsh git nginx php curl zip unzip openssh intel-ucode
