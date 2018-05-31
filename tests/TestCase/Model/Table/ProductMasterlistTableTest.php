<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductMasterlistTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductMasterlistTable Test Case
 */
class ProductMasterlistTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductMasterlistTable
     */
    public $ProductMasterlist;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_masterlist'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductMasterlist') ? [] : ['className' => 'App\Model\Table\ProductMasterlistTable'];
        $this->ProductMasterlist = TableRegistry::get('ProductMasterlist', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductMasterlist);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
