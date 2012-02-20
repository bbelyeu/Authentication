<?php
/* User Test cases generated on: 2012-02-18 12:20:00 : 1329589200*/
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.user', 'app.employer_account', 'app.employer', 'app.location', 'app.city', 'app.state', 'app.country', 'app.postal_code', 'app.charity', 'app.job', 'app.job_title', 'app.job_type', 'app.education', 'app.profile', 'app.profile_status', 'app.resume', 'app.career_experience', 'app.applicant', 'app.hire', 'app.referral', 'app.referral_payment', 'app.ranking', 'app.rating', 'app.workflow_stage', 'app.job_status', 'app.industry', 'app.employers_industry', 'app.workflow');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
