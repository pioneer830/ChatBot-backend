<?php

namespace Database\Seeders;

use App\Models\CharacterLength;
use App\Models\Industry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('industries')->truncate();
        $value_str = "Advertising, Aerospace, Agriculture, Apparel, Artificial Intelligence, Automotive, Biotechnology, Blockchain, Broadcasting, Business Services, Chemicals, Cloud Services, Construction, Consulting, Consumer Electronics, Cosmetics, Cybersecurity, Dental, Digital Marketing, Document Management, Drones, Education, E-commerce, Energy, Engineering, Entertainment, Environmental Services, Events, Executive Coaching, Facility Management, Fashion, Financial Services, Fitness, Food & Beverage, Franchising, Gaming, Government, Healthcare, Home Improvement, Hospitality, Human Resources, Insurance, Internet of Things, IT Services, Laboratory Supplies, Landscaping, Legal Services, Logistics, Manufacturing, Market Research, Marketing, Marine, Medical Devices, Mining, Nanotechnology, Nonprofit, Office Supplies, Oil & Gas, Outsourcing, Payment Processing, Pet Care, Pharmaceuticals, Printing, Professional Services, Public Relations, Real Estate, Renewable Energy, Retail, Robotics, SaaS, Security Systems, Shipping, Social Media, Sports, Staffing, Sustainability, Telecommunications, Tourism, Training & Development, Translation Services, Transportation, Utilities, Veterinary, Virtual Reality, Waste Management, Water Treatment, Other";
        $value_array = explode(", ", $value_str);
        $records = [];
        foreach ($value_array as $key => $value) {
            array_push($records, [
                'id' => $key + 1,
                'name' => $value
            ]);
        }
        Industry::insert($records);
    }

}
