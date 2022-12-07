<?php

$autoloadPath = implode(DIRECTORY_SEPARATOR, [
    __DIR__,
    'vendor',
    'autoload.php',
]);

if (!file_exists($autoloadPath)) {
    print_r('Run `composer dump-autoload` and try again');
    exit();
}

require_once($autoloadPath);

$path = [
    __DIR__,
    'xml',
    'store.xml',
];
$store = new \Gloversure\Store\Store(implode(DIRECTORY_SEPARATOR, $path));

function example1() {
    global $store;



    $basket = new \Gloversure\Store\Basket();

    $basket->addItems(
        $store->getProduct('ST01'),
        6
    );

    return $basket->total;
}
function example2() {
    global $store;


    
    $rule = new \Gloversure\Store\Rules(1, 2, 0,'CH01');

    $rule1= $rule->get_rule();

    $basket = new \Gloversure\Store\Basket($rule1);

    $basket->addItems(
        $store->getProduct('CH01'),
        2
    );

    return $basket->total;
}
function example3() {
    global $store;

    $basket = new \Gloversure\Store\Basket();

    $basket->addItems(
        $store->getProduct('CH01'),
        4
    );

    return $basket->total;
}
function example4() {
    global $store;


    $rule = new \Gloversure\Store\Rules(1, 1, 3.99,'ST01');

    $rule2= $rule->get_rule();


    $basket = new \Gloversure\Store\Basket($rule2);

    $basket->addItems(
        $store->getProduct('ST01'),
        4
    );
    $basket->addItems(
        $store->getProduct('CH01'),
        4
    );

    return $basket->total;
}
function example5() {
    global $store;

    $basket = new \Gloversure\Store\Basket();

    $basket->addItems(
        $store->getProduct('NEW01'),
        3
    );
    $basket->addItems(
        $store->getProduct('AP01'),
        3
    );

    return $basket->total;
}

print_r('Example 1 result: ' . example1() . PHP_EOL);
print_r('Example 2 result: ' . example2() . PHP_EOL);
print_r('Example 3 result: ' . example3() . PHP_EOL);
print_r('Example 4 result: ' . example4() . PHP_EOL);

// Uncomment this when you have finished challenge 3
// print_r('Example 5 result: ' . example5() . PHP_EOL);
