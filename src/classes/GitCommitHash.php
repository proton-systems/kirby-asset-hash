<?php

class GitCommitHash implements HashInterface
{
    // set this variable as static to only read the git hash file only once per request
    public static $hash;

    /**
     * Returns the hash based on the last commit hash of the branch
     *
     * @param string $branch
     * @return bool|string
     */
    function getHash($branch = 'master')
    {
        if(self::$hash) {
            return self::$hash;
        }

        if (self::$hash = file_get_contents(sprintf('../' . '.git/refs/heads/%s', $branch))) {
            return self::$hash;
        } else {
            return false;
        }
    }
}