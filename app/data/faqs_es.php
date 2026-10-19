<?php

declare(strict_types=1);

/**
 * FAQs for the Spanish home page (/es/), also marked up as FAQPage schema.
 */
$b = config('business');

return [
    ['q' => '¿Trabajan con negocios hispanos en Denver?', 'a' => 'Sí. Somos una agencia de marketing bilingüe y multicultural. Ayudamos a negocios latinos y a empresas que quieren llegar al mercado hispano de Colorado.'],
    ['q' => '¿Cuánto cuesta el marketing digital en Denver?', 'a' => 'La mayoría de los negocios locales invierten entre $1,000 y $5,000 al mes en gestión, más el presupuesto de anuncios. Armamos un plan según tus metas y tu presupuesto.'],
    ['q' => '¿Tengo que firmar un contrato largo?', 'a' => 'No. Nuestros planes son mes a mes, sin contratos a largo plazo y sin cargos ocultos.'],
    ['q' => '¿Dónde está su oficina?', 'a' => 'Estamos en ' . $b['street'] . ', ' . $b['city'] . ', CO ' . $b['postal_code'] . ', al norte de Denver. Atendemos todo el área metropolitana y Colorado Springs.'],
];
