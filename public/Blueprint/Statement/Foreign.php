<?php

namespace Cable\Ordm\Blueprint\Statement;


use Cable\Ordm\Blueprint\StatementBag;

class Foreign extends StatementBag
{


    /**
     * @return $this
     */
    public function onDeleteCascade() : Foreign{
        $this->statements[] = new Cascade('DELETE');

        return $this;
    }

    /**
     * @return $this
     */
    public function onUpdateCascade() : Foreign{
        $this->statements[] = new Cascade('UPDATE');

        return $this;
    }
}