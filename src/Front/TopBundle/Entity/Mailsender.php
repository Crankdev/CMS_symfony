<?php

namespace Front\TopBundle\Entity;

/**
 * Mailsender
 */
class Mailsender
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $send_mail;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Mailsender
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set sendMail
     *
     * @param boolean $sendMail
     *
     * @return Mailsender
     */
    public function setSendMail($sendMail)
    {
        $this->send_mail = $sendMail;

        return $this;
    }

    /**
     * Get sendMail
     *
     * @return boolean
     */
    public function getSendMail()
    {
        return $this->send_mail;
    }
}
