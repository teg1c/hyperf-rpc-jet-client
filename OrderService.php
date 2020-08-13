<?php

use Hyperf\Jet\AbstractClient;
use Hyperf\Jet\Packer\JsonEofPacker;
use Hyperf\Jet\Transporter\StreamSocketTransporter;
use Hyperf\Rpc\Contract\DataFormatterInterface;
use Hyperf\Rpc\Contract\PackerInterface;
use Hyperf\Rpc\Contract\PathGeneratorInterface;
use Hyperf\Rpc\Contract\TransporterInterface;

/**
 * @method int add(int $a, int $b);
 */
class OrderService extends AbstractClient
{
    // 定义 `CalculatorService` 作为 $service 参数的默认值
    public function __construct(
        string $service = 'OrderService',
        TransporterInterface $transporter = null,
        PackerInterface $packer = null,
        ?DataFormatterInterface $dataFormatter = null,
        ?PathGeneratorInterface $pathGenerator = null
    ) {
        // 这里指定 transporter，您仍然可以通过 ProtocolManager 来获得 transporter 或从构造函数传递
        $transporter = new StreamSocketTransporter('127.0.0.1', 9512);
        // 这里指定 packer，您仍然可以通过 ProtocolManager 来获得 packer 或从构造函数传递
        $packer = new JsonEofPacker();
        parent::__construct($service, $transporter, $packer, $dataFormatter, $pathGenerator);
    }
}
