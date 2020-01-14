<?php

/**
 * Teste Unitário
 * 
 * Execmplo de teste unitário utilizando PHPUnit
 * 
 * Para executar basta executar o comando no diretório raiz:
 * ./vendor/bin/phpunit
 *
 * @author Tayron Miranda <dev@tayron.com.br>
 */
class ExemploTest extends PHPUnit_Framework_TestCase 
{
    /**
     * ExemploTest::testEmpty
     * 
     * Testa se uma variável está vazia
     * 
     * @return array
     */
    public function testEmpty()
    {
        $stack = array();
        $this->assertEmpty($stack);

        return $stack;
    }

    /**
     * ExemploTest::testPush
     * 
     * @depends testEmpty
     */
    public function testPush(array $stack)
    {
        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertNotEmpty($stack);

        return $stack;
    }

    /**
     * ExemploTest::testPop
     * 
     * @depends testPush
     */
    public function testPop(array $stack)
    {
        $this->assertEquals('foo', array_pop($stack));
        $this->assertEmpty($stack);
    }   
}
