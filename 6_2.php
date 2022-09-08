<?php
//Реализация паттерна "Стратегия"

interface PayStrategyInterface{
    public function pay($totalSum,$userPhone);
}

class QiwiPayStrategy implements PayStrategyInterface {
    public function pay($totalSum,$userPhone)
    {
        echo "Qiwi pay $totalSum, $userPhone";
    }
}

class YandexPayStrategy implements PayStrategyInterface {
    public function pay($totalSum,$userPhone)
    {
        echo "Yandex pay $totalSum, $userPhone";
    }
}

class WebMoneyPayStrategy implements PayStrategyInterface {
    public function pay($totalSum,$userPhone)
    {
        echo "WebMoney pay $totalSum, $userPhone";
    }
}



class PayService{
    protected PayStrategyInterface $payStrategy;

    /**
     * PayService constructor.
     * @param PayStrategyInterface $payStrategy
     */
    public function __construct(PayStrategyInterface $payStrategy)
    {
        $this->payStrategy = $payStrategy;
    }

    public function run(float $totalSum, string $userPhone)
    {
        $this->payStrategy->pay($totalSum, $userPhone);
    }

}

$payService = new PayService(
    new YandexPayStrategy()
);

$payService->run(2586.8,"+7889554122");