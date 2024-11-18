<?php

require_once 'src/Entities/BusinessEntity.php';

class BusinessDisplayService {
    /**
     * @param BusinessEntity[] $businesses
     */
    public static function displayAll(array $businesses): string
    {
        $output = '';

        foreach ($businesses as $business) {
            $output .= "<div>
                <h3>$business->name - Founded on $business->founded</h3>
                <p>$business->description</p>
                <p>$business->type</p>
            </div>";
        }

        return $output;
    }
}