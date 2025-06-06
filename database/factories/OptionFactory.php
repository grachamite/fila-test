<?php

namespace Database\Factories;

use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Option>
 */
class OptionFactory extends Factory
{
    private array $used = [];

    const CAR_OPTIONS = [
        'Датчик давления в шинах',
        'Антиблокировочная система (ABS)',
        'Система стабилизации (ESP)',
        'Блокировка замков задних дверей',
        'ЭРА-ГЛОНАСС',
        'Бронированный кузов',
        'Противотуманные фары',
        'Адаптивное освещение',
        'Датчик дождя',
        'Датчик света',
        'Автоматический корректор фар',
        'Автоматический дальний свет',
        'Омыватель фар',
        'Фаркоп',
        'Защита картера',
        'Проекционный дисплей',
        'Система выбора режима движения',
        'Дистанционный запуск двигателя',
        'Открытие багажника без помощи рук',
        'Мультифункциональное рулевое колесо',
        'Электронная приборная панель',
        'Система доступа без ключа',
        'Запуск двигателя с кнопки',
        'Программируемый предпусковой отопитель',
        'Электропривод крышки багажника',
        'Электроскладывание зеркал',
        'Память боковых зеркал',
        'Подрулевые лепестки переключения передач',
        'Регулируемый педальный узел',
        'Система «старт-стоп»',
        'Электропривод зеркал',
        'Русифицированное меню',
        'Мультимедиа система с ЖК-экраном',
        'Мультимедиа система для задних пассажиров',
        'Дистанционное управление автомобилем',
        'Беспроводная зарядка для смартфона',
        'USB',
        'Навигационная система',
        'Голосовое управление',
        'Android Auto',
        'CarPlay',
        'Яндекс Авто',
        'AUX',
        'Bluetooth',
        'Розетка 12V',
        'Розетка 220V',
        'Обвес кузова',
        'Рейлинги на крыше',
        'Аэрография',
        'Центральный замок',
        'Датчик проникновения в салон (датчик объема)',
        'Иммобилайзер',
        'Спортивные передние сиденья',
        'Люк',
        'Панорамная крыша / лобовое стекло',
        'Сиденья с массажем',
        'Обогрев рулевого колеса',
        'Отделка кожей рулевого колеса',
        'Отделка кожей рычага КПП',
        'Третий ряд сидений',
        'Складывающееся заднее сиденье',
        'Передний центральный подлокотник',
        'Тонированные стекла'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $options = self::CAR_OPTIONS;
        $existedOptions = Option::query()->pluck('id')->toArray() + $this->used;
        $options = array_values(array_filter($options, function($option) use ($existedOptions) {
            return ! in_array($option, $existedOptions);
        }));

        $option = $options[rand(0, count($options) - 1)];
        $this->used[] = $option;

        return [
            'name' => $option,
            'description' => fake()->realText(256),
            'price' => fake()->numberBetween(1, 100000) + fake()->numberBetween(0, 99) / 100

        ];
    }
}
