<?php

namespace Dtc\QueueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dtc\GridBundle\Annotation as Grid;

/**
 * @ORM\Entity
 * @ORM\Table(name="dtc_queue_run_archive")
 * @ORM\Table(name="dtc_queue_run_archive",indexes={
 *                  @ORM\Index(name="run_archive_ended_at_idx", columns={"ended_at"})})
 * @Grid\Grid(actions={@Grid\ShowAction()},sort=@Grid\Sort(column="endedAt",direction="DESC"))
 */
class RunArchive extends BaseRun
{
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $startedAt;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $duration; // How long to run for in seconds

    /**
     * @Grid\Column(sortable=true, order=2)
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $endedAt;

    /**
     * @Grid\Column()
     * @ORM\Column(type="float", nullable=true)
     */
    protected $elapsed;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $maxCount;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $lastHeartbeatAt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $processTimeout;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $currentJobId;
}
