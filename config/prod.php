<?php

// configure your app for the production environment
$app['twig.path'] = array(__DIR__ . '/../templates');
$app['twig.options'] = array('cache' => __DIR__ . '/../var/cache/twig');


// db config 
$app['config'] = require __DIR__ . '/../config/config.php';
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'dbname' => 'cinemadatabase',
        'user' => $app['config']['database']['user'],
        'password' => $app['config']['database']['password'],
        'host' => 'localhost',
        'port' => 3306,
        'charset' => 'utf8',
        'driver' => 'pdo_mysql',
    ),
));

// mappings
$app['mappings'] = require __DIR__ . '/../config/mappings.php';
$app['repository_factory'] = new Repository\RepositoryFactory($app['db'], $app['mappings']['repositories']);

// SwiftMailer
$app['swiftmailer.options'] = array(
    'host' => 'smtp.gmail.com',
    'port' => '25',
    'username' => $app['config']['mailer']['user'],
    'password' => $app['config']['mailer']['password'],
    'encryption' => 'tls',
    'auth_mode' => null
);

/* Projected income query test
  $firstDate = new \DateTime();
  $firstDate->setDate(2016, 5, 10);
  $secondDate = new \DateTime();
  $secondDate->setDate(2016, 5, 10);
  $projectedIncome = $app['schedule_repository']->getProjectedIncomeBetween($firstDate, $secondDate);
  echo $projectedIncome; */

/* Second projected income query test 
$firstDate = new \DateTime();
$firstDate->setDate(2016, 5, 7);
$secondDate = new \DateTime();
$secondDate->setDate(2016, 5, 10);
$projectedIncome = $app['schedule_repository']->getProjectedIncomeForMovieBetween($firstDate, $secondDate, "Warcraft");
echo $projectedIncome;*/

/* Booking query test 
try {
    $booking = new \Entity\BookingEntity(array('seats' => 1, 'user_id' => 1, 'schedule_id' => 1));
    $app['booking_repository']->makeBooking($booking);
} catch (Exception $ex) {
    echo $ex->getMessage();
}*/
 