<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quota
 *
 * @ORM\Table(name="quota", indexes={@ORM\Index(name="idx_quota_deleted_at", columns={"deleted_at"})})
 * @ORM\Entity
 */
class Quota
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="quota_id_seq", allocationSize=1, initialValue=1)
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
     * @var string
     *
     * @ORM\Column(name="criteria", type="text", nullable=true)
     */
    private $criteria;

    /**
     * @var string
     *
     * @ORM\Column(name="key", type="text", nullable=true)
     */
    private $key;

    /**
     * @var integer
     *
     * @ORM\Column(name="remaining", type="bigint", nullable=true)
     */
    private $remaining;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_count", type="bigint", nullable=true)
     */
    private $maxCount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_depletion", type="datetimetz", nullable=true)
     */
    private $lastDepletion;

    /**
     * @var integer
     *
     * @ORM\Column(name="refill_delay_seconds", type="integer", nullable=true)
     */
    private $refillDelaySeconds;

    public function loadFromArray($item) {
        $this->setId($item['ID']);
        $this->setCreatedAt($item['CreatedAt']);
        $this->setUpdatedAt($item['UpdatedAt']);
        $this->setDeletedAt($item['CreatedAt']);
        $this->setCriteria($item['Criteria']);
        $this->setKey($item['Key']);
        $this->setRemaining($item['Remaining']);
        $this->setMaxCount($item['MaxCount']);
        $this->setLastDepletion($item['LastDepletion']);
        $this->setRefillDelaySeconds($item['RefillDelaySeconds']);

        return $this;
    }

    public function convertToArray(){
        return array(
            'ID' => $this->getId(),
            'Criteria' => $this->getCriteria(),
            'Key' => $this->getKey(),
            'MaxCount' => $this->getMaxCount(),
            'RefillDelaySeconds' => $this->getRefillDelaySeconds()
        );

    }
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
     * @return string
     */
    public function getCriteria() {
        return $this->criteria;
    }

    /**
     * @param string $criteria
     */
    public function setCriteria($criteria) {
        $this->criteria = $criteria;
    }

    /**
     * @return string
     */
    public function getKey() {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key) {
        $this->key = $key;
    }

    /**
     * @return int
     */
    public function getRemaining() {
        return $this->remaining;
    }

    /**
     * @param int $remaining
     */
    public function setRemaining($remaining) {
        $this->remaining = $remaining;
    }

    /**
     * @return int
     */
    public function getMaxCount() {
        return $this->maxCount;
    }

    /**
     * @param int $maxCount
     */
    public function setMaxCount($maxCount) {
        $this->maxCount = $maxCount;
    }

    /**
     * @return \DateTime
     */
    public function getLastDepletion() {
        return $this->lastDepletion;
    }

    /**
     * @param \DateTime $lastDepletion
     */
    public function setLastDepletion($lastDepletion) {
        $this->lastDepletion = $lastDepletion;
    }

    /**
     * @return int
     */
    public function getRefillDelaySeconds() {
        return $this->refillDelaySeconds;
    }

    /**
     * @param int $refillDelaySeconds
     */
    public function setRefillDelaySeconds($refillDelaySeconds) {
        $this->refillDelaySeconds = $refillDelaySeconds;
    }

}

