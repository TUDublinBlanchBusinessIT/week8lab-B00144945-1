<?php
class CarPolicy {
    private $policyNumber;
    private $yearlyPremium;
    private $dateOfLastClaim;

    public function __construct($policyNumber, $yearlyPremium) {
        $this->policyNumber = $policyNumber;
        $this->yearlyPremium = $yearlyPremium;
        $this->dateOfLastClaim = null;
    }

    public function setDateOfLastClaim($date) {
        $this->dateOfLastClaim = $date;
    }

    public function getTotalYearsNoClaims() {
        $currentDate = new DateTime();
        $lastClaimDate = new DateTime($this->dateOfLastClaim);
        $interval = $currentDate->diff($lastClaimDate);
        return $interval->format("%y");
    }

    public function __toString() {
        return $this->policyNumber . ': ' . 'Unknown';
    }

    public function getNoClaimsString() {
        return $this->__toString() . ' has ' . $this->getTotalYearsNoClaims() . ' years no claims.';
    }
}
?>


