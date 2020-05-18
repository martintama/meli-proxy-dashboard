<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * RequestMetric
 *
 * @ORM\Table(name="request_metric", indexes={@ORM\Index(name="idx_request_metric_deleted_at", columns={"deleted_at"})})
 * @ORM\Entity
 */
class RequestMetric
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="request_metric_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetimetz", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetimetz", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetimetz", nullable=true)
     */
    private $deletedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="eventdate", type="datetimetz", nullable=true)
     */
    private $eventdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="success", type="bigint", nullable=true)
     */
    private $success;

    /**
     * @var integer
     *
     * @ORM\Column(name="rejects", type="bigint", nullable=true)
     */
    private $rejects;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedAt() {
        return $this->deletedAt;
    }

    /**
     * @param \DateTime $deletedAt
     */
    public function setDeletedAt($deletedAt) {
        $this->deletedAt = $deletedAt;
    }

    /**
     * @return \DateTime
     */
    public function getEventdate() {
        return $this->eventdate;
    }

    /**
     * @param \DateTime $eventdate
     */
    public function setEventdate($eventdate) {
        $this->eventdate = $eventdate;
    }

    /**
     * @return int
     */
    public function getSuccess() {
        return $this->success;
    }

    /**
     * @param int $success
     */
    public function setSuccess($success) {
        $this->success = $success;
    }

    /**
     * @return int
     */
    public function getRejects() {
        return $this->rejects;
    }

    /**
     * @param int $rejects
     */
    public function setRejects($rejects) {
        $this->rejects = $rejects;
    }

    public function loadFromArray($item) {
        $this->setId($item['ID']);
        $this->setCreatedAt($item['CreatedAt']);
        $this->setUpdatedAt($item['UpdatedAt']);
        $this->setDeletedAt($item['CreatedAt']);
        $this->setEventdate(\DateTime::createFromFormat(DATE_ISO8601, $item['Eventdate']));
        $this->setSuccess($item['Success']);
        $this->setRejects($item['Rejects']);

        return $this;
    }

}

