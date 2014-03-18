<?php

namespace Days;

/**
 * Class MineField
 * @package Days
 */
class MineField
{
    /**
     * @param $input
     * @return array
     */
    public function provideHint(array $input)
    {
        $hint = $this->createEmptyHintWithMines($input);

        foreach ($input as $rowId => $row) {
            foreach ($row as $key => $item) {
                if ($item == '*') {
                    //previous row
                    $this->modifyHintRow($hint, $rowId - 1, $key);
                    //current row
                    $this->modifyHintRow($hint, $rowId, $key);
                    //next row
                    $this->modifyHintRow($hint, $rowId + 1, $key);
                }
            }
        }

        return $hint;
    }

    /**
     * @param $input
     * @return array
     */
    private function createEmptyHintWithMines($input)
    {
        $hint = array();
        foreach ($input as $row) {
            $hintRow = array();

            foreach ($row as $key => $item) {
                if ($item == '*') {
                    $hintRow[$key] = '*';
                } else {
                    $hintRow[$key] = 0;
                }
            }
            $hint[] = $hintRow;
        }
        return $hint;
    }

    /**
     * @param $hint
     * @param $nextRowId
     * @param $key
     * @internal param $RowId
     * @return mixed
     */
    private function modifyHintRow(&$hint, $nextRowId, $key)
    {
        if (isset($hint[$nextRowId][$key - 1])) {
            $hint[$nextRowId][$key - 1] = $hint[$nextRowId][$key - 1] + 1;
        }

        if (isset($hint[$nextRowId][$key])) {
            if ($hint[$nextRowId][$key] !== '*') {
                $hint[$nextRowId][$key] = $hint[$nextRowId][$key] + 1;
            }
        }

        if (isset($hint[$nextRowId][$key + 1])) {
            $hint[$nextRowId][$key + 1] = $hint[$nextRowId][$key + 1] + 1;
            return $hint;
        }
    }
    
    private function testingGitHubApi()
    {
        $val = 'foo';
        
        return $val;
    }
} 
