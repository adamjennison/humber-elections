<?php

class CandidatesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('candidates')->truncate();
        
		\DB::table('candidates')->insert(array (
			0 => 
			array (
				'id' => '1',
				'forenames' => 'Majorie Ann',
				'surname' => 'Brabazon',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:10',
				'updated_at' => '2015-01-22 21:07:10',
			),
			1 => 
			array (
				'id' => '2',
				'forenames' => 'Simone',
				'surname' => 'Butterworth',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:11',
				'updated_at' => '2015-01-22 21:07:11',
			),
			2 => 
			array (
				'id' => '3',
				'forenames' => 'Martin John',
				'surname' => 'Deane',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:11',
				'updated_at' => '2015-01-22 21:07:11',
			),
			3 => 
			array (
				'id' => '4',
				'forenames' => 'Alexander David',
				'surname' => 'Hayward',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:11',
				'updated_at' => '2015-01-22 21:07:11',
			),
			4 => 
			array (
				'id' => '5',
				'forenames' => 'Daniel Mark',
				'surname' => 'Bond',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:12',
				'updated_at' => '2015-01-22 21:07:12',
			),
			5 => 
			array (
				'id' => '6',
				'forenames' => 'Ruth Deborah',
				'surname' => 'Payne',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:12',
				'updated_at' => '2015-01-22 21:07:12',
			),
			6 => 
			array (
				'id' => '7',
				'forenames' => 'Philip David',
				'surname' => 'Pocknee',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:13',
				'updated_at' => '2015-01-22 21:07:13',
			),
			7 => 
			array (
				'id' => '8',
				'forenames' => 'Paul Nigel',
				'surname' => 'Salvidge',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:13',
				'updated_at' => '2015-01-22 21:07:13',
			),
			8 => 
			array (
				'id' => '9',
				'forenames' => 'Colin Robert',
				'surname' => 'Baxter',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:14',
				'updated_at' => '2015-01-22 21:07:14',
			),
			9 => 
			array (
				'id' => '10',
				'forenames' => 'Anita',
				'surname' => 'Harrison',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:14',
				'updated_at' => '2015-01-22 21:07:14',
			),
			10 => 
			array (
				'id' => '11',
				'forenames' => 'Eleanor Frances',
				'surname' => 'Wood',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:15',
				'updated_at' => '2015-01-22 21:07:15',
			),
			11 => 
			array (
				'id' => '12',
				'forenames' => 'Eden',
				'surname' => ' Barnes',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:15',
				'updated_at' => '2015-01-22 21:07:15',
			),
			12 => 
			array (
				'id' => '13',
				'forenames' => 'Philip John',
				'surname' => 'Webster',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:15',
				'updated_at' => '2015-01-22 21:07:15',
			),
			13 => 
			array (
				'id' => '14',
				'forenames' => 'David',
				'surname' => 'Wood',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:16',
				'updated_at' => '2015-01-22 21:07:16',
			),
			14 => 
			array (
				'id' => '15',
				'forenames' => 'Colin David',
				'surname' => 'Worrall',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:16',
				'updated_at' => '2015-01-22 21:07:16',
			),
			15 => 
			array (
				'id' => '16',
				'forenames' => 'John Logan',
				'surname' => 'Fareham',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:17',
				'updated_at' => '2015-01-22 21:07:17',
			),
			16 => 
			array (
				'id' => '17',
				'forenames' => 'Malcolm Peter',
				'surname' => 'Johnson',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:17',
				'updated_at' => '2015-01-22 21:07:17',
			),
			17 => 
			array (
				'id' => '18',
				'forenames' => 'Sarita Roseanne',
				'surname' => 'Robinson',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:18',
				'updated_at' => '2015-01-22 21:07:18',
			),
			18 => 
			array (
				'id' => '19',
				'forenames' => 'Karen Jane',
				'surname' => 'Rouse-Deane',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:18',
				'updated_at' => '2015-01-22 21:07:18',
			),
			19 => 
			array (
				'id' => '20',
				'forenames' => 'James Edward',
				'surname' => 'Russell',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:18',
				'updated_at' => '2015-01-22 21:07:18',
			),
			20 => 
			array (
				'id' => '21',
				'forenames' => 'Gwendoline',
				'surname' => 'Lunn',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:19',
				'updated_at' => '2015-01-22 21:07:19',
			),
			21 => 
			array (
				'id' => '22',
				'forenames' => 'Cheryl Elizabeth',
				'surname' => 'Payne',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:19',
				'updated_at' => '2015-01-22 21:07:19',
			),
			22 => 
			array (
				'id' => '23',
				'forenames' => 'Robert Brian',
				'surname' => 'Shepherd',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:20',
				'updated_at' => '2015-01-22 21:07:20',
			),
			23 => 
			array (
				'id' => '24',
				'forenames' => 'Eleonor Ruth',
				'surname' => 'Whitehead',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:20',
				'updated_at' => '2015-01-22 21:07:20',
			),
			24 => 
			array (
				'id' => '25',
				'forenames' => 'Salman',
				'surname' => 'Anwar',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:21',
				'updated_at' => '2015-01-22 21:07:21',
			),
			25 => 
			array (
				'id' => '26',
				'forenames' => 'Linda',
				'surname' => 'Chambers',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:21',
				'updated_at' => '2015-01-22 21:07:21',
			),
			26 => 
			array (
				'id' => '27',
				'forenames' => 'Jannette',
				'surname' => 'Hornby',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:22',
				'updated_at' => '2015-01-22 21:07:22',
			),
			27 => 
			array (
				'id' => '28',
				'forenames' => 'John',
				'surname' => 'Paterson',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:22',
				'updated_at' => '2015-01-22 21:07:22',
			),
			28 => 
			array (
				'id' => '29',
				'forenames' => 'John Mathew',
				'surname' => 'Crompton',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:22',
				'updated_at' => '2015-01-22 21:07:22',
			),
			29 => 
			array (
				'id' => '30',
				'forenames' => 'Jacqueline',
				'surname' => 'Dad',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:23',
				'updated_at' => '2015-01-22 21:07:23',
			),
			30 => 
			array (
				'id' => '31',
				'forenames' => 'Surjit',
				'surname' => 'Singh',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:23',
				'updated_at' => '2015-01-22 21:07:23',
			),
			31 => 
			array (
				'id' => '32',
				'forenames' => 'Paul',
				'surname' => 'Spooner',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:24',
				'updated_at' => '2015-01-22 21:07:24',
			),
			32 => 
			array (
				'id' => '33',
				'forenames' => 'Denise',
				'surname' => 'Thompson',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:24',
				'updated_at' => '2015-01-22 21:07:24',
			),
			33 => 
			array (
				'id' => '34',
				'forenames' => 'Philip',
				'surname' => 'Mackay',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:25',
				'updated_at' => '2015-01-22 21:07:25',
			),
			34 => 
			array (
				'id' => '35',
				'forenames' => 'Adam',
				'surname' => 'Phillips',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:28',
				'updated_at' => '2015-01-22 21:07:28',
			),
			35 => 
			array (
				'id' => '36',
				'forenames' => 'John Graham',
				'surname' => 'Robinson',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:28',
				'updated_at' => '2015-01-22 21:07:28',
			),
			36 => 
			array (
				'id' => '37',
				'forenames' => 'Michael Harold',
				'surname' => 'Thompson',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:29',
				'updated_at' => '2015-01-22 21:07:29',
			),
			37 => 
			array (
				'id' => '38',
				'forenames' => 'Carol Ann',
				'surname' => 'Clarkson',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:29',
				'updated_at' => '2015-01-22 21:07:29',
			),
			38 => 
			array (
				'id' => '39',
				'forenames' => 'Sophie',
				'surname' => 'Fairburn',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:29',
				'updated_at' => '2015-01-22 21:07:29',
			),
			39 => 
			array (
				'id' => '40',
				'forenames' => 'Leslie Harry',
				'surname' => 'Fisher',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:30',
				'updated_at' => '2015-01-22 21:07:30',
			),
			40 => 
			array (
				'id' => '41',
				'forenames' => 'Elaine Lesley',
				'surname' => 'Keal',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:30',
				'updated_at' => '2015-01-22 21:07:30',
			),
			41 => 
			array (
				'id' => '42',
				'forenames' => 'Sharon Valerie',
				'surname' => 'Belcher',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:31',
				'updated_at' => '2015-01-22 21:07:31',
			),
			42 => 
			array (
				'id' => '43',
				'forenames' => 'Sean',
				'surname' => 'Chaytor',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:31',
				'updated_at' => '2015-01-22 21:07:31',
			),
			43 => 
			array (
				'id' => '44',
				'forenames' => 'James Tristan',
				'surname' => 'Galer',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:35',
				'updated_at' => '2015-01-22 21:07:35',
			),
			44 => 
			array (
				'id' => '45',
				'forenames' => 'Jake Michael',
				'surname' => 'Morrison',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:36',
				'updated_at' => '2015-01-22 21:07:36',
			),
			45 => 
			array (
				'id' => '46',
				'forenames' => 'Julian Marcus',
				'surname' => 'Penna',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:36',
				'updated_at' => '2015-01-22 21:07:36',
			),
			46 => 
			array (
				'id' => '47',
				'forenames' => 'Margaret Forrest',
				'surname' => 'Tompsett',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:37',
				'updated_at' => '2015-01-22 21:07:37',
			),
			47 => 
			array (
				'id' => '48',
				'forenames' => 'Brian Charles',
				'surname' => 'Tompsett',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:37',
				'updated_at' => '2015-01-22 21:07:37',
			),
			48 => 
			array (
				'id' => '49',
				'forenames' => 'Lee Gordon James',
				'surname' => 'Fallin',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:38',
				'updated_at' => '2015-01-22 21:07:38',
			),
			49 => 
			array (
				'id' => '50',
				'forenames' => 'Michael John',
				'surname' => 'Lammiman',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:38',
				'updated_at' => '2015-01-22 21:07:38',
			),
			50 => 
			array (
				'id' => '51',
				'forenames' => 'Martin',
				'surname' => 'Mancey',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:44',
				'updated_at' => '2015-01-22 21:07:44',
			),
			51 => 
			array (
				'id' => '52',
				'forenames' => 'Joshua',
				'surname' => 'Myers',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:44',
				'updated_at' => '2015-01-22 21:07:44',
			),
			52 => 
			array (
				'id' => '53',
				'forenames' => 'Stanley',
				'surname' => 'Smith',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:45',
				'updated_at' => '2015-01-22 21:07:45',
			),
			53 => 
			array (
				'id' => '54',
				'forenames' => 'Stephanie Anne',
				'surname' => 'Bond',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:45',
				'updated_at' => '2015-01-22 21:07:45',
			),
			54 => 
			array (
				'id' => '55',
				'forenames' => 'Steven Vincent George',
				'surname' => 'Carter',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:46',
				'updated_at' => '2015-01-22 21:07:46',
			),
			55 => 
			array (
				'id' => '56',
				'forenames' => 'Alan',
				'surname' => 'Clark',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:46',
				'updated_at' => '2015-01-22 21:07:46',
			),
			56 => 
			array (
				'id' => '57',
				'forenames' => 'Gillian Ann',
				'surname' => 'Coupland',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:47',
				'updated_at' => '2015-01-22 21:07:47',
			),
			57 => 
			array (
				'id' => '58',
				'forenames' => 'Dehenna Sheridan',
				'surname' => 'Davison',
				'gender' => NULL,
				'created_at' => '2015-01-22 21:07:50',
				'updated_at' => '2015-01-22 21:07:50',
			),
			58 => 
			array (
				'id' => '59',
				'forenames' => 'Terence',
				'surname' => 'Geraghty',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:50',
				'updated_at' => '2015-01-22 21:07:50',
			),
			59 => 
			array (
				'id' => '60',
				'forenames' => 'Karl William',
				'surname' => 'Hordon',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:50',
				'updated_at' => '2015-01-22 21:07:50',
			),
			60 => 
			array (
				'id' => '61',
				'forenames' => 'Carole Angela',
				'surname' => 'Needham',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:51',
				'updated_at' => '2015-01-22 21:07:51',
			),
			61 => 
			array (
				'id' => '62',
				'forenames' => 'Christine Elizabeth',
				'surname' => 'Randall',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:51',
				'updated_at' => '2015-01-22 21:07:51',
			),
			62 => 
			array (
				'id' => '63',
				'forenames' => 'Abigail Katherine',
				'surname' => 'Bell',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:52',
				'updated_at' => '2015-01-22 21:07:52',
			),
			63 => 
			array (
				'id' => '64',
				'forenames' => 'Malcolm Ernest',
				'surname' => 'Fields',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:52',
				'updated_at' => '2015-01-22 21:07:52',
			),
			64 => 
			array (
				'id' => '65',
				'forenames' => 'Naomi',
				'surname' => 'Fuller',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:07:56',
				'updated_at' => '2015-01-22 21:07:56',
			),
			65 => 
			array (
				'id' => '66',
				'forenames' => 'Peter',
				'surname' => 'Mawer',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:56',
				'updated_at' => '2015-01-22 21:07:56',
			),
			66 => 
			array (
				'id' => '67',
				'forenames' => 'Richard Keith',
				'surname' => 'Barrett',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:57',
				'updated_at' => '2015-01-22 21:07:57',
			),
			67 => 
			array (
				'id' => '68',
				'forenames' => 'Samuel Gary',
				'surname' => 'Beckton',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:57',
				'updated_at' => '2015-01-22 21:07:57',
			),
			68 => 
			array (
				'id' => '69',
				'forenames' => 'David William',
				'surname' => 'Gemmell',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:57',
				'updated_at' => '2015-01-22 21:07:57',
			),
			69 => 
			array (
				'id' => '70',
				'forenames' => 'Allen Frederick',
				'surname' => 'Healand',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:58',
				'updated_at' => '2015-01-22 21:07:58',
			),
			70 => 
			array (
				'id' => '71',
				'forenames' => 'Stephen',
				'surname' => 'Brady',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:58',
				'updated_at' => '2015-01-22 21:07:58',
			),
			71 => 
			array (
				'id' => '72',
				'forenames' => 'Michael Wilfred',
				'surname' => 'Chambers',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:59',
				'updated_at' => '2015-01-22 21:07:59',
			),
			72 => 
			array (
				'id' => '73',
				'forenames' => 'Oliver',
				'surname' => 'Harris',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:07:59',
				'updated_at' => '2015-01-22 21:07:59',
			),
			73 => 
			array (
				'id' => '74',
				'forenames' => 'Michael',
				'surname' => 'Hookem',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:08:00',
				'updated_at' => '2015-01-22 21:08:00',
			),
			74 => 
			array (
				'id' => '75',
				'forenames' => 'Peter Rowland',
				'surname' => 'March',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:08:00',
				'updated_at' => '2015-01-22 21:08:00',
			),
			75 => 
			array (
				'id' => '76',
				'forenames' => 'Robert Anthony',
				'surname' => 'Cook',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:08:00',
				'updated_at' => '2015-01-22 21:08:00',
			),
			76 => 
			array (
				'id' => '77',
				'forenames' => 'Kenneth Andrew',
				'surname' => 'Fairburn',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:08:01',
				'updated_at' => '2015-01-22 21:08:01',
			),
			77 => 
			array (
				'id' => '78',
				'forenames' => 'Nadine',
				'surname' => 'Fudge',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:08:01',
				'updated_at' => '2015-01-22 21:08:01',
			),
			78 => 
			array (
				'id' => '79',
				'forenames' => 'Tracey Irene',
				'surname' => 'Henry',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:08:02',
				'updated_at' => '2015-01-22 21:08:02',
			),
			79 => 
			array (
				'id' => '80',
				'forenames' => 'Simon Peter',
				'surname' => 'Kelsey',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:08:02',
				'updated_at' => '2015-01-22 21:08:02',
			),
			80 => 
			array (
				'id' => '81',
				'forenames' => 'Terence Edward',
				'surname' => 'Keal',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:08:03',
				'updated_at' => '2015-01-22 21:08:03',
			),
			81 => 
			array (
				'id' => '82',
				'forenames' => 'Anthony John',
				'surname' => 'Morfitt',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:08:03',
				'updated_at' => '2015-01-22 21:08:03',
			),
			82 => 
			array (
				'id' => '83',
				'forenames' => 'Christopher',
				'surname' => 'Oakley',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:08:03',
				'updated_at' => '2015-01-22 21:08:03',
			),
			83 => 
			array (
				'id' => '84',
				'forenames' => 'Theresa',
				'surname' => 'Vaughan',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:08:04',
				'updated_at' => '2015-01-22 21:08:04',
			),
			84 => 
			array (
				'id' => '85',
				'forenames' => 'Victoria Jayne',
				'surname' => 'Butler',
				'gender' => 'female',
				'created_at' => '2015-01-22 21:08:04',
				'updated_at' => '2015-01-22 21:08:04',
			),
			85 => 
			array (
				'id' => '86',
				'forenames' => 'Leon Sean',
				'surname' => 'French',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:08:05',
				'updated_at' => '2015-01-22 21:08:05',
			),
			86 => 
			array (
				'id' => '87',
				'forenames' => 'Richard John',
				'surname' => 'Howarth',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:08:05',
				'updated_at' => '2015-01-22 21:08:05',
			),
			87 => 
			array (
				'id' => '88',
				'forenames' => 'Chris',
				'surname' => 'Randall',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:08:06',
				'updated_at' => '2015-01-22 21:08:06',
			),
			88 => 
			array (
				'id' => '89',
				'forenames' => 'Steven Paul',
				'surname' => 'Wilson',
				'gender' => 'male',
				'created_at' => '2015-01-22 21:08:06',
				'updated_at' => '2015-01-22 21:08:06',
			),
		));
	}

}
