<?php
/**
 * MagedIn Technology
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @category  MagedIn
 * @copyright Copyright (c) 2025 MagedIn Technology.
 *
 * @author    MagedIn Support <support@magedin.com>
 */

declare(strict_types=1);

namespace MagedIn\Framework\Magento2\Formatter;

use MagedIn\Framework\Magento2\Normalizer\Postcode as PostcodeNormalizer;

class Postcode
{
    /**
     * @var int
     */
    const FIRST_GROUP_LENGTH = 5;

    /**
     * @var array
     * @SuppressWarnings(PHPMD)
     */
    private $regions = [
        0 => 'Grande São Paulo',
        1 => 'Interior de São Paulo',
        2 => 'Rio de Janeiro e Espírito Santo',
        3 => 'Minas Gerais',
        4 => 'Bahia e Sergipe',
        5 => 'Pernambuco, Alagoas, Paraíba e Rio Grande do Norte',
        6 => 'Ceará, Piauí, Maranhão, Pará, Amazonas, Acre, Amapá e Roraima',
        7 => 'Distrito Federal, Goiás, Tocantins, Mato Grosso, Mato Grosso do Sul e Rondônia',
        8 => 'Paraná e Santa Catarina',
        9 => 'Rio Grande do Sul',
    ];

    /**
     * @var PostcodeNormalizer
     */
    private PostcodeNormalizer $postcodeNormalizer;

    public function __construct(
        PostcodeNormalizer $postcodeNormalizer
    ) {
        $this->postcodeNormalizer = $postcodeNormalizer;
    }

    /**
     * @param string $postcode
     *
     * @return string
     */
    public function format(string $postcode): string
    {
        $postcode = str_split($this->postcodeNormalizer->normalize($postcode), self::FIRST_GROUP_LENGTH);
        return implode('-', $postcode);
    }
}
