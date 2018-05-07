<?php
/*
 * Checks that control structures have a blank line before them.
 * Based on Symfony2_Sniffs_Formatting_BlankLineBeforeReturnSniff sniffer
 *
 * @author    Jesús Plou <jplou@onestic.com>
 * @copyright 2017 Onestic
 */

namespace Ecg\Sniffs\Functions;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Util\Tokens;

class SpacingBeforeSniff implements Sniff
{

    /**
     * A list of tokenizers this sniff supports.
     *
     * @var array
     */
    public $supportedTokenizers = array(
                                   'PHP',
                                   'JS',
                                  );


    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(
                T_FUNCTION,
               );

    }//end register()


    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The file being scanned.
     * @param int                  $stackptr  The position of the current token in the
     *                                        stack passed in $tokens.
     *
     * @return void
     */
    public function process(File $phpcsFile, $stackPtr)
    {

        $fp = fopen("/home/jplou/coding-standard/debug.log", "w+");
        fwrite($fp, PHP_EOL);
        fwrite($fp, PHP_EOL);
        fwrite($fp, '*******');

        $tokens         = $phpcsFile->getTokens();
        $current        = $stackPtr;
        $previousLine   = $tokens[$stackPtr]['line'] - 1;
        $prevLineTokens = array();

        while ($tokens[$current]['line'] >= $previousLine) {
            if ($tokens[$current]['line'] == $previousLine &&
                $tokens[$current]['type'] != 'T_WHITESPACE' &&
                $tokens[$current]['type'] != 'T_COMMENT' &&
                $tokens[$current]['type'] != 'T_DOC_COMMENT_OPEN_TAG' &&
                $tokens[$current]['type'] != 'T_DOC_COMMENT_WHITESPACE' &&
                $tokens[$current]['type'] != 'T_DOC_COMMENT_STRING' &&
                $tokens[$current]['type'] != 'T_DOC_COMMENT_CLOSE_TAG'
            ) {
                $prevLineTokens[] = $tokens[$current]['type'];
            }
            $current--;
        }

        if (isset($prevLineTokens[0])
            && $prevLineTokens[0] == 'T_OPEN_CURLY_BRACKET'
        ) {
            return;
        } else if(count($prevLineTokens) > 0) {
            $phpcsFile->addError(
                'Missing blank line before function',
                $stackPtr,
                'NoLineBeforeOpen'
            );
        }

        return;
    }
}
