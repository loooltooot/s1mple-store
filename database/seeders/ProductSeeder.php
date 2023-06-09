<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Оригинальная Комбуча',
                'description' => 'Наша оригинальная комбуча создается из отборных чайных листьев с помощью тщательного процесса ферментации. Она имеет освежающий и терпкий вкус, который бодрит ваши вкусовые рецепторы.',
                'price' => mt_rand(50, 150),
                'img' => '1.png',
            ],
            [
                'title' => 'Зеленый чай Комбуча',
                'description' => 'Насыщенная антиоксидантами и натуральными ароматизаторами, наша комбуча на основе зеленого чая порадует вас субтильным сочетанием чая и кислинки в каждом глотке.',
                'price' => mt_rand(50, 150),
                'img' => '2.png',
            ],
            [
                'title' => 'Комбуча с гибискусом и малиной',
                'description' => 'Погрузитесь в мир ярких вкусов гибискуса и малины с нашей комбучей. Это очаровательное сочетание предлагает освежающий и фруктовый вкус, который заставит вас хотеть еще.',
                'price' => mt_rand(50, 150),
                'img' => '3.png',
            ],
            [
                'title' => 'Комбуча с имбирем и лимоном',
                'description' => 'Наша комбуча с имбирем и лимоном - это оживляющий и освежающий выбор. Сочетание свежего имбиря и кислотности лимона создает уникальный и оживляющий профиль вкуса.',
                'price' => mt_rand(50, 150),
                'img' => '4.png',
            ],
            [
                'title' => 'Комбуча с черникой',
                'description' => 'Наши комбуча с черникой созданы с использованием самых свежих ягод и тщательно подобранного чая. Они предлагают неповторимый вкус сочетания черники и приятной кислинки.',
                'price' => mt_rand(50, 150),
                'img' => '5.png',
            ],
            [
                'title' => 'Манго-пассифлора Комбуча',
                'description' => 'Окунитесь в тропические вкусы манго и пассифлоры с нашей комбучей. Это сочетание экзотических фруктов создает освежающий и энергетический напиток.',
                'price' => mt_rand(50, 150),
                'img' => '6.png',
            ],
            [
                'title' => 'Ананас-мята Комбуча',
                'description' => 'Освежите свои чувства с нашей комбучей ананас-мята. Сладкая кислинка ананаса, сочетающаяся с прохладой мяты, перенесет вас в тропическое раю.',
                'price' => mt_rand(50, 150),
                'img' => '7.png',
            ],
            [
                'title' => 'Комбуча с клубникой и базиликом',
                'description' => 'Насладитесь изысканным сочетанием спелой клубники и ароматного базилика в нашей комбуче. Это уникальное сочетание предлагает баланс сладости и свежести трав.',
                'price' => mt_rand(50, 150),
                'img' => '8.png',
            ],
            [
                'title' => 'Лавандовая Комбуча с ромашкой',
                'description' => 'Расслабьтесь и насладитесь нашей лавандовой комбучей с ромашкой. Спокойные цветочные нотки лаванды и ромашки создают успокаивающий и ароматный напиток.',
                'price' => mt_rand(50, 150),
                'img' => '9.png',
            ],
            [
                'title' => 'Цитрусовая Комбуча',
                'description' => 'Окунитесь в мир ярких и свежих цитрусовых вкусов с нашей комбучей. Это освежающее сочетание апельсинов, лимонов и грейпфрутов разбудит ваши вкусовые рецепторы.',
                'price' => mt_rand(50, 150),
                'img' => '10.png',
            ],
            [
                'title' => 'Комбуча с малиной и лаймом',
                'description' => 'Насладитесь восхитительным сочетанием малины и кислого лайма в нашей комбуче. Это фруктовое сочетание предлагает взрыв вкусов с каждым глотком.',
                'price' => mt_rand(50, 150),
                'img' => '11.png',
            ],
            [
                'title' => 'Комбуча с арбузом и мятой',
                'description' => 'Утолите жажду нашей комбучей с арбузом и мятой. Сладость арбуза, сочетающаяся с прохладой мяты, создает идеальный напиток для летнего времени года.',
                'price' => mt_rand(50, 150),
                'img' => '12.png',
            ],
            [
                'title' => 'Комбуча с персиком и жасмином',
                'description' => 'Погрузитесь в ароматный мир персика и нежного жасмина с нашей комбучей. Это сочетание фруктов и цветочных нот создает роскошный и вкусный напиток.',
                'price' => mt_rand(50, 150),
                'img' => '13.png',
            ],
            [
                'title' => 'Гранатовая Комбуча',
                'description' => 'Ощутите пульсацию вкусов с нашей гранатовой комбучей. Яркий и сладкий вкус граната дополняется приятной кислинкой, создавая уникальное сочетание.',
                'price' => mt_rand(50, 150),
                'img' => '14.png',
            ],
            [
                'title' => 'Комбуча с вишней и розмарином',
                'description' => 'Насладитесь утонченным сочетанием сладкой вишни и ароматного розмарина в нашей комбуче. Это сочетание создает богатый и насыщенный профиль вкуса.',
                'price' => mt_rand(50, 150),
                'img' => '15.png',
            ],
            [
                'title' => 'Комбуча с алоэ вера и огурцом',
                'description' => 'Освежитесь и оздоровитесь с нашей комбучей алоэ вера и огурцом. Сочетание освежающего алоэ вера и хрустящего огурца создает непревзойденный напиток.',
                'price' => mt_rand(50, 150),
                'img' => '16.png',
            ],
            [
                'title' => 'Комбуча с яблоком и корицей',
                'description' => 'Окунитесь в атмосферу тепла и уюта с нашей комбучей яблоко-корица. Сладость яблока и теплота корицы создают приятное вкусовое сочетание.',
                'price' => mt_rand(50, 150),
                'img' => '17.png',
            ],
            [
                'title' => 'Комбуча с грушей и имбирем',
                'description' => 'Насладитесь сочетанием сладкой груши и острым имбирем в нашей комбуче. Это уравновешенное сочетание предлагает сладость и пряность в каждом глотке.',
                'price' => mt_rand(50, 150),
                'img' => '18.png',
            ],
            [
                'title' => 'Комбуча с клюквой и розмарином',
                'description' => 'Попробуйте нашу комбучу с клюквой и розмарином для неповторимого вкусового опыта. Яркая кислинка клюквы сочетается с ароматными нотками розмарина.',
                'price' => mt_rand(50, 150),
                'img' => '19.png',
            ],
            [
                'title' => 'Комбуча с манго и кокосом',
                'description' => 'Окунитесь в тропическое наслаждение с нашей комбучей манго-кокос. Сладость манго и кремовость кокоса создают нежный и экзотический напиток.',
                'price' => mt_rand(50, 150),
                'img' => '20.png',
            ],
        ];



        foreach ($products as $product) {
            Product::create($product)->save();
        }
    }
}
