<?php

require_once realpath(dirname(__FILE__) . '/../../..') . '/enviroment.php';

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-02-04 at 17:54:03.
 */
class CategoryApiTest extends PHPUnit_Framework_TestCase {

    /**
     * @var CategoryApi
     */
    protected $object;

    /**
     * Test add/update category data
     * @var array 
     */
    protected $testData;

    /**
     * Test category from DB
     * @var array 
     */
    protected $testCategory;

    /**
     * Test category i18n from DB
     * @var array
     */
    protected $testCategoryI18N;

    /**
     * Categories count from DB
     * @var type 
     */
    protected $testCategoriesCount;

    /**
     * Codeigniter object
     * @var object 
     */
    protected $ci;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = \Category\CategoryApi::getInstance();

        /** Test add/update data */
        $this->testData = array(
            'tpl' => 'testTPL',
            'order_method' => 2,
            'showsitetitle' => 1,
            'parent_id' => 1,
            'url' => random_string(),
            'active' => 1,
            'image' => 'testImage',
            'name' => 'testName',
            'h1' => 'testH1',
            'description' => 'testDescription',
            'meta_desc' => 'testMetaDesc',
            'meta_title' => 'testMetaTitle',
            'meta_keywords' => 'testMetaKeywords',
            'position' => 1,
            'external_id' => 11
        );

        $this->ci = & get_instance();

        /** Get first category from DB */
        $this->testCategory = $this->ci->db->limit(1)->get('shop_category');
        $this->testCategory = $this->testCategory ? $this->testCategory->row_array() : array();

        /** Get first category i18n from DB */
        $this->testCategoryI18N = $this->ci->db->limit(1)->get('shop_category_i18n');
        $this->testCategoryI18N = $this->testCategoryI18N ? $this->testCategoryI18N->row_array() : array();

        /** Get categories count from DB */
        $this->testCategoriesCount = $this->ci->db->get('shop_category');
        $this->testCategoriesCount = $this->testCategoriesCount ? $this->testCategoriesCount->num_rows() : 0;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers CategoryApi::getInstance
     */
    public function testGetInstance() {
        $this->assertTrue($this->object instanceof \Category\CategoryApi);
    }

    /**
     * @covers CategoryApi::getError
     * @todo   Implement testGetError().
     */
    public function testGetError() {
        /** Check if is empty when no errors */
        $this->assertEmpty($this->object->getError());
    }

    /**
     * @covers CategoryApi::addCategory
     */
    public function testAddCategory() {
        $result = $this->object->addCategory($this->testData, 'ru');

        if ($result)
            $this->assertTrue($result instanceof \SCategory);

        /** Check on equals set test data and result category */
        $this->assertEquals($result->getUrl(), $this->testData['url']);
        $this->assertEquals($result->getParentId(), $this->testData['parent_id']);

        $result = $this->object->addCategory();

        $this->assertFalse($result);

        if (!$result)
            $this->assertTrue($this->object->getError() == lang('You did not specified data array'));
    }

    /**
     * @covers CategoryApi::addCategoryI18N
     */
    public function testAddCategoryI18N() {
        $result = $this->object->addCategoryI18N($this->testCategory['id'], $this->testData, random_string());

        if ($result)
            $this->assertTrue($result instanceof \SCategoryI18n);


        $result = $this->object->addCategoryI18N();

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() == lang('Category(ies) id(s) not specified'));
        }

        $result = $this->object->addCategoryI18N($this->testCategory['id']);

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() == lang('You did not specified data array'));
        }
    }

    /**
     * @covers CategoryApi::updateCategory
     */
    public function testUpdateCategory() {
        $result = $this->object->updateCategory($this->testCategory['id'], $this->testData, random_string());

        if ($result)
            $this->assertTrue($result instanceof \SCategory);

        /** Check on equals set test data and result category */
        $this->assertEquals($result->getUrl(), $this->testData['url']);
        $this->assertEquals($result->getParentId(), $this->testData['parent_id']);

        $result = $this->object->updateCategory();

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() == lang('Category(ies) id(s) not specified'));
        }
    }

    /**
     * @covers CategoryApi::updateCategoryI18N
     */
    public function testUpdateCategoryI18N() {
        $result = $this->object->updateCategoryI18N($this->testCategory['id'], $this->testData, random_string());

        if ($result)
            $this->assertTrue($result instanceof \SCategoryI18n);


        $result = $this->object->updateCategoryI18N();

        $this->assertFalse($result);

        if (!$result) {
            $this->assertTrue($this->object->getError() == lang('Category(ies) id(s) not specified'));
        }
    }

    /**
     * @covers CategoryApi::getCategory
     */
    public function testGetCategory() {
        $result = $this->object->getCategory();

        $this->assertEquals(count($result), $this->testCategoriesCount);

        if (count($this->testCategoriesCount) > 0)
            $this->assertGreaterThan(0, count($result));

        $result = $this->object->getCategory($this->testCategory['id']);

        $this->assertCount(1, $result);
    }

    /**
     * @covers CategoryApi::deleteCategory
     */
    public function testDeleteCategory() {
        $result = $this->object->deleteCategory($this->testCategory['id']);

        $this->assertTrue($result);

        $result = $this->object->deleteCategory();

        $this->assertFalse($result);

        $this->assertTrue($this->object->getError() == lang('Category(ies) id(s) not specified'));
    }

    /**
     * @covers CategoryApi::getTree
     */
    public function testGetTree() {
        $result = $this->object->getTree();

        $this->assertEquals(count($result), $this->testCategoriesCount);
    }

}
