# 1. 🔥 Орчин бэлтгэх (Laravel) 🔥

Дараах орчин бэлтгэх
Laragon -ийг суулгахад (php, nginx, mysql,….)

-   php

```
php --version
```

-   composer

```
composer --version
```

-   git

```
git --version
```

# 2. 📁 Фолдер бэлдэх 📁

Фолдер дотроо бэлдэх жишээ нь myapps нэртэй фолдер үүсгэсэх

Тухайн фолдер дотроо project үүсгэх

```
composer create-project laravel/laravel irst
```

# 3. 📊 Өгөгдлийн баазтай холбох 📊

.env файл дээр тохиргоо хийж өгөх ёстой.

Жишээ нь:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=irts
DB_USERNAME=root
DB_PASSWORD=
```

# 4. 🛡️ Нэвтрэх, хамгаалалтын нэмэл санг суулгах 🛡️

```
composer require laravel/breeze --dev
php artisan breeze:install
```

# 5. 🌱 Модел болон migration-ийг үүсгэх 🌱

```
php artisan make:model Stat -m
php artisan make:model Teacher -m
php artisan make:model Course -m
php artisan make:model Student -m
php artisan make:model Attendance -m
```

migration файл дотор дараах кодыг нэмнэ.

## Stat migration 🌱

```
    $table->id();
    $table->string('name');
    $table->string('abr');
```

## Teacher migration 🌱

```
    $table->id();
    $table->string('firstName');
    $table->string('lastName');
    $table->string('gender');
    $table->string('phoneNumber');
    $table->string('lesson');
```

## Course migration 🌱

```
    $table->id();
    $table->unsignedBigInteger('teacher_id')->index();
    $table->integer('grade');
    $table->string('group');
    $table->string('YearLesson');
    $table->boolean('isActive');


    $table->foreign('teacher_id')->references('id')->on('teachers')->cascadeOnDelete();
```

## Student migration 🌱

```
    $table->id();
    $table->unsignedBigInteger('course_id')->index();
    $table->string('firstName');
    $table->string('lastName');
    $table->string('gender');
    $table->string('phoneNumber');
    $table->string('RD');
    $table->boolean('isActive');


    $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete();
```

## Attendance migration 🌱

```
    $table->id();
    $table->unsignedBigInteger('course_id')->index();
    $table->unsignedBigInteger('student_id')->index();
    $table->unsignedBigInteger('stat_id')->index();
    $table->date('adate');
    $table->timestamps();


    $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete();
    $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete();
    $table->foreign('stat_id')->references('id')->on('stats')->cascadeOnDelete();
```

# 6. ⚡️ Бааз руу хүснэгт үүсгэх ⚡️

Migration дээр бичигдсэн командын тусламжтайгаар өгөгдлийн бааз руу хүснэгтүүдийг үүсгэнэ.

Анх migration үүсгэх үед дараах командыг ашиглаж болно.

```
php artisan migrate
```

Хуучин хүснэгтүүдээ устгаж шинээр үүсгэхдээ дараах командыг ашиглаж болно.

```
php artisan migrate:refresh
```

Хуучин хүснэгтүүдээ устгаж шинээр үүсгээд дараа нь Seeder-ийг ажиллуулна.

```
php artisan migrate:refresh --seed
```

migration хийх үед алдаа гарсан бол дараах командын тусламжтайгаар засварлаж болно.

```
composer dump-autoload
```

Migration-ийг буцаах үүрэгтэй

```
php artisan migrate:rollback
```

Сүүлийн k ш migration-ийг буцаах

```
php artisan migrate:rollback --step=5
```

Бусад хэлбэрүүд

```
php artisan migrate:rollback --pretend
php artisan migrate:reset
```

# 7. 🎯 Seeder үүсгэх 🎯

## Seeder -ийг дараах командын тусламжтайгаар үүсгэх болно. 🎯

Seeder файлуудыг дараах командын тусламжтайгаар үүсгэнэ.

```
php artisan make:seeder StatSeeder
php artisan make:seeder TeacherSeeder
php artisan make:seeder CourseSeeder
```

Жишээ болгон StatSeeder-ийн кодыг оруулж байна.

```
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stats')->delete();
        $datas = [
            ['id' => 1, 'name' => 'Ирсэн', 'abr' => 'и'],
            ['id' => 2, 'name' => 'Чөлөөтэй', 'abr' => 'ч'],
            ['id' => 3, 'name' => 'Өвчтэй', 'abr' => 'ө'],
            ['id' => 4, 'name' => 'Тасалсан', 'abr' => 'т'],
        ];
        DB::table('stats')->insert($datas);
    }
}

```

Уг StatSeeder-ийн тусламжтайгаар өгөгдлийн баазад өгөгдлүүдийг оруулахдаа дараах комындыг өгнө.

```
php artisan db:seed --class=StatSeeder
```

Үүнтэй ижилээр бусад Seeder үүдийг үүсгэж болно.

```
php artisan db:seed --class=TeacherSeeder
php artisan db:seed --class=TeacherSeeder
```

Ерөнхий seeder-ийг ажиллуулахдаа
php artisan db:seed

# 8. 🏭 Factory -ийг үүсгэх 🏭

Facroty команд нь тэст хийхэд зориулагдсан бөгөөд өгөгдлийн сан дахь тухайн хүснэгт рүү санамсаргүйгээр олон тооны өгөгдлийг үүсгэж оруулах боломжийг олгож өгдөг.

Тэгэхээр олон өгөгдөл оруулан тест хийх шаардлагатай өгөгдөл дээр ашиглавал илүү тохиромжтой байдаг. Жишээ нь Stat хүснэгт нь олон тооны өгөгдөл оруулах шаардлагагүй учир StatSeeder-ийн тусламжтайгаар өгөгдлүүдээ оруулж өгөх нь тохиромжтой.

Харин Course хүснэгт ч гэсэн CourseSeeder-ийн тусламжтайгаар өгөгдлүүдээ оруулж болох юм. Гэсэн хэдий ч бид Seeder болон Factory гэсэн 2 хэлбэрээр тестлэх дата-г оруулсан ч болно. Иймд туршилт байдлаар CourseFactory-ийг үүсгэж туршиж үзье.

CourseFactory-ийг үүсгэхдээ дараах командыг өгдөг.

```
php artisan make:factory CourseFactory
```

Үүсгэсэн CourseFactory дотроо хүснэгт рүү санамсаргүйгээр оруулах утгуудыг тодорхойлж өгөх.

жишээ нь:

```
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teacher_id' => $this->faker->numberBetween($min=20200101, $max=20200107),
            'grade' => $this->faker->numberBetween($min=1, $max=13),
            'group' => $this->faker->randomElement(['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З']),
            'YearLesson' =>$this->faker->randomElement(['2023-2024', '2022-2023', '2021-2022', '2020-2021']),// $this->faker->sentence(1),
            'isActive' => $this->faker->boolean(),
        ];
    }
}

```

Үүний дараа өгөгдлөө санамсаргүйгээр үүсгэхдээ DatabaseSeeder дотор дуудаж өгөх шаардлагатай байдаг.

Дуудасхдаа дараах кодын тусламжтайгаар дуудаж ажиллуулна.

```
\App\Models\Course::factory(10)->create();
```

Дээрх дуудаж байгаа команд нь Course руу санамсаргүй 10 мөр өгөгдөл үүсгэ гэсэн команд юм.

Үүнтэй ижилээр StudentFactory-ийг үүсгэж болох юм.

Тэгвэл дараах командаар StudentFactory файлаа үүсгэх ёстой.

```
php artisan make:factory StudentFactory
```

Тухайн StudentFactory дотор санамсаргүйгээр өгөгдөл үүсгэх кодыг бичиж өгнө.

Энд жишээ болгон StudentFactory дотор нэмж бичих гол кодын загварыг оруулж өгвөл.

```
        return [
            'course_id' => $this->faker->numberBetween($min=1, $max=7),
            'firstName' => fake()->name(),
            'lastName' => fake()->name(),
            'gender' =>$this->faker->randomElement(['эрэгтэй', 'эмэгтэй']),
            'phoneNumber' => fake()->name(),
            'RD' =>fake()->name(),
            'isActive' => $this->faker->boolean(),
        ];
```

Үүнийг мөн DatabaseSeeder дотор дуудаж ажиллуулдаг.
Өмнөх код дээр нэмж бичвэл

```
\App\Models\Course::factory(10)->create();
\App\Models\Student::factory(150)->create();
```

Дээрх код нь Student хүснэгт рүү 150 мөр өгөгдлийг санамсаргүйгээр оруулна гэсэн үг юм.

Уг кодыг бичсний дараар дараах нэг командын тусламжтайгаар 3 seeder болон 2 Factory-ийг бүгдийг нь ажиллуулахдаа дараах командын тусламжтайгаар дуудаж ажиллуулна.

```
php artisan db:seed
```

# 9. 🛠️ Model-ийн тохиргоо хийх 🛠️

Модел дээр relationship холболт болон нэмэл функцүүдийг бичиж өгснөөр Controller нь түүнийг ашиглан хэрэгцээт өгөгдлөө дуудах боломжтой болно.

Жишээ болнон бид өөрсдийн Model дээр бичигдэх кодыг оруулъя.

## Stat model 🔧

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function attendances(){
        return $this->hasMany(Attendance::class,'stat_id');
    }

}

```

## Teacher model 🔧

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function courses(){
        return $this->hasMany(Course::class,'teacher_id');
    }

}

```

## Course model 🔧

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function students(){
        return $this->hasMany(Student::class,'course_id');
    }

    public function attendances(){
        return $this->hasMany(Attendance::class,'course_id');
    }
}

```

## Student model 🔧

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }

    public function attendances(){
        return $this->hasMany(Attendance::class,'student_id');
    }
}

```

## Attendance model 🔧

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function stat(){
        return $this->belongsTo(Stat::class,'stat_id');
    }


}

```

# 🕹️ Controller үүсгэх 🕹️

Controller-ийг дараах командын тусламжтайгаар үүсгэнэ.

```
php artisan make:controller StatController --resource
php artisan make:controller StudentController --resource
php artisan make:controller TeacherController --resource
php artisan make:controller CourseController --resource

php artisan make:controller AttendanceController --resource
```

# Route-ийг удирдах 🕹️

routes/api.php файлд route-үүдийг бичиж өгнө.

### 1. Шууд route хэсгээс хариулт өгөх хэлбэр

```
Route::get('/greeting', function () {
    return 'Hello World';
});
```

### 2. Controller-ийн функцийг дуудах үед

    - Controller-ийг routes/api.php дотор дуудаж оруулж ирнэ.
    - Үндсэн код бичигдэнэ.

```
    Route::get('/courses', [TeacherController::class, 'index']);
    Route::get('/courses/{id}', [TeacherController::class, 'show']);
    Route::post('/courses', [TeacherController::class, 'create']);
    Route::post('/courses/{id}', [TeacherController::class, 'update']);
    Route::delete('/courses/{id}', [TeacherController::class, 'destroy']);
```

Route-ийн дуудалтыг харах командыг өгч болно.

```
php artisan route:list
```

# 📝 Resource файлыг үүсгэх 📝

Resource файл нь хэрэглэгч рүү илгээх мэдээллийг форматлах үүрэгтэй байдаг.

```
php artisan make:resource CourseResource
```

php artisan make:controller PhotoController --model=Photo --resource --requests 31. 32. 33. php artisan make:resource GradeResource 34. 35. php artisan make:resource GradeCollection 36.
