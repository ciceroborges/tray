<?php

namespace Tests\Unit;

use App\Repositories\Contracts\ISaleRepository;
use App\Services\Contracts\ISellerService;
use App\Services\SaleService;
use PHPUnit\Framework\TestCase;

class GetCommissionTest extends TestCase
{
    
    protected $service;
    /**
     * setup...
     */
    protected function setUp(): void
    {
        parent::setUp();
        // Criar um mock para a interface ISaleRepository e ISellerService
        $saleRepositoryMock = $this->createMock(ISaleRepository::class);
        $sellerServiceMock  = $this->createMock(ISellerService::class);

        // Injetar o mock no construtor do SaleService
        $this->service = new SaleService($saleRepositoryMock, $sellerServiceMock);
    }


    /**
     * A basic test example.
     */
    public function test_calculate_commission_with_decimal_fee(): void
    {
        $value = 10000; // Valor em centavos (R$ 100,00)
        
        $fee = 8.5 / 100; // Valor em decimal (0.085)

        $expectedCommission = 850; // Comissão esperada em centavos (R$ 8,50)

        $commission = $this->service->getCommission($value, $fee);

        $this->assertEquals($expectedCommission, $commission);
    }
}
