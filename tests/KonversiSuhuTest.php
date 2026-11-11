<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class KonversiSuhuTest extends TestCase
{
    // Pengujian Celsius ke Fahrenheit
    #[DataProvider('fahrenheitProvider')]
    public function testCelsiusCanBeConvertedToFahrenheit(
        float $c,
        float $expected
    ): void {
        // Arrange
        $konversi = new KonversiSuhu();

        // Act
        $hasil = $konversi->celsiusKeFahrenheit($c);

        // Assert
        $this->assertEqualsWithDelta($expected, $hasil, 0.001);
    }

    // Data pengujian Fahrenheit
    public static function fahrenheitProvider(): array
    {
        return [
            'titik beku' => [0, 32],
            'titik didih' => [100, 212],
            'suhu negatif' => [-10, 14],
            'suhu tubuh' => [36.6, 97.88],
        ];
    }

    // Pengujian Celsius ke Kelvin
    #[DataProvider('kelvinProvider')]
    public function testCelsiusCanBeConvertedToKelvin(
        float $c,
        float $expected
    ): void {
        // Arrange
        $konversi = new KonversiSuhu();

        // Act
        $hasil = $konversi->celsiusKeKelvin($c);

        // Assert
        $this->assertEqualsWithDelta($expected, $hasil, 0.001);
    }

    // Data pengujian Kelvin
    public static function kelvinProvider(): array
    {
        return [
            'titik beku' => [0, 273.15],
            'titik didih' => [100, 373.15],
            'suhu negatif' => [-10, 263.15],
            'suhu tubuh' => [36.6, 309.75],
        ];
    }
}
