<?php

namespace Src\Dto;

class InvoiceDto implements PacketDataInterface
{
    private InvoiceHeaderDto $header;

    /** @var InvoiceBodyDto[] */
    private array $body;

    /** @var PaymentDto[] */
    private array $payments;

    public function getHeader(): InvoiceHeaderDto
    {
        return $this->header;
    }

    public function setHeader(InvoiceHeaderDto $header): static
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return InvoiceBodyDto[]
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @param InvoiceBodyDto[] $body
     */
    public function setBody(array $body): static
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return PaymentDto[]
     */
    public function getPayments(): array
    {
        return $this->payments;
    }

    /**
     * @param PaymentDto[] $payments
     */
    public function setPayments(array $payments): static
    {
        $this->payments = $payments;
        return $this;
    }

    public function addBody(InvoiceBodyDto $bodyDto): self
    {
        $this->body[] = $bodyDto;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'header' => $this->getHeader()->toArray(),
            'body' => array_map(fn (InvoiceBodyDto $body) => $body->toArray(), $this->getBody()),
            'payments' => array_map(fn (PaymentDto $payment) => $payment->toArray(), $this->getPayments()),
            'extension' => [
                [
                    'key' => null,
                    'value' => null,
                ]
            ]
        ];
    }
}