<?php
namespace Aura\View\Helper;

/**
 * Test class for Title.
 * Generated by PHPUnit on 2011-04-02 at 08:29:14.
 */
class TitleTest extends AbstractHelperTest
{
    public function test__invoke()
    {
        $title = new Title;
        $actual = $title();
        $this->assertInstanceOf('Aura\View\Helper\Title', $actual);
    }
    
    /**
     * @todo Implement test__invoke().
     */
    public function testEverything()
    {
        $title = new Title;
        $this->assertInstanceOf('Aura\View\Helper\Title', $title);
        
        $title->set('This & That');
        
        $title->append(' Suf1');
        $title->append(' Suf2');
        
        $title->prepend('Pre1 ');
        $title->prepend('Pre2 ');
        
        $actual = $title->get();
        $expect = '    <title>Pre2 Pre1 This & That Suf1 Suf2</title>' . PHP_EOL;
        $this->assertSame($expect, $actual);
    }

    /**
     * @todo Implement testSetIndent().
     */
    public function testSetIndent()
    {
        $title = new Title;
        $title->setIndent('  ');
        $title->set('This & That');
        $actual = $title->get();
        $expect = '  <title>This & That</title>' . PHP_EOL;
        $this->assertSame($expect, $actual);
    }
}
