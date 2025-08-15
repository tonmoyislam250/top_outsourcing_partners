<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMemberSeeder extends Seeder
{
    public function run()
    {
        // TeamMember::create([
        //     'id' => 1,
        //     'image' => 'images/about/user1.png',
        //     'modal_image' => 'images/about/user1.png',
        //     'name' => 'Dr. Rajib Hasan',
        //     'title' => 'Advisor | Top Outsourcing Partners',
        //     'description' => 'Dr. Rajib Hasan is a seasoned academic and industry expert in financial accounting, management accounting, and regulatory compliance.',
        //     'education' => [
        //         'Ph.D. in Accounting from the University of Texas at Dallas',
        //         'MBA from Georgia State University',
        //         'Certified Management Accountant (CMA) credentials'
        //     ],
        //     'expertise' => [
        //         'Financial accounting',
        //         'Management accounting',
        //         'Regulatory compliance',
        //         'Financial analysis',
        //         'Corporate compliance'
        //     ],
        //     'vision' => 'To guide organizations in delivering efficient outsourcing solutions, streamline financial operations, and ensure cost-effective compliance and transparency in outsourced services.',
        //     'is_principal' => 1,
        // ]);

        // TeamMember::create([
        //     'id' => 2,
        //     'image' => 'images/about/user2.png',
        //     'modal_image' => 'images/about/user2.png',
        //     'name' => 'Shubhankar Shil',
        //     'title' => 'Founder & CEO | Top Outsourcing Partners',
        //     'description' => 'Shubhankar Shil is the Founder and CEO of Top Outsourcing Partners (TOP), where he has successfully led the company since its inception. With over 15 years of experience in strategic consulting, outsourcing solutions, and business growth, Shubhankar has transformed TOP into a global leader in providing high-quality outsourcing services for clients across various sectors.',
        //     'education' => [
        //         'Chartered Accountancy (CA)',
        //         'LL.B. degree',
        //         'MBA from Dhaka University',
        //         'BBA in Accounting'
        //     ],
        //     'expertise' => [
        //         'Strategic consulting',
        //         'Outsourcing solutions',
        //         'Business growth',
        //         'Corporate law and governance',
        //         'Financial management'
        //     ],
        //     'vision' => 'To drive innovation, client success, and operational excellence in outsourcing solutions while mentoring young entrepreneurs and fostering economic growth through entrepreneurship.',
        //     'is_principal' => 0,
        // ]);

        // TeamMember::create([
        //     'id' => 3,
        //     'image' => 'images/about/user3.png',
        //     'modal_image' => 'images/about/user3.png',
        //     'name' => 'Khokan Chandra Das',
        //     'title' => 'Executive Director | Revenue & Product | Top Outsourcing Partners',
        //     'description' => 'Khokan Chandra Das is the Executive Director of Revenue & Product at Top Outsourcing Partners (TOP), where he has played a key role in driving business growth and product innovation. With over 20 years of experience in financial management, business development, and strategic leadership, Khokan has been instrumental in shaping TOP's product offerings and expanding its global footprint.',
        //     'education' => [
        //         'Bachelor's Degree in Commerce from Dhaka University'
        //     ],
        //     'expertise' => [
        //         'Financial management',
        //         'Business development',
        //         'Strategic leadership',
        //         'Corporate governance',
        //         'Budgeting and financial analysis'
        //     ],
        //     'vision' => 'To develop innovative outsourcing products that help businesses scale without compromising on quality and to mentor local entrepreneurs for sustainable business practices.',
        //     'is_principal' => 0,
        // ]);

        // TeamMember::create([
        //     'id' => 4,
        //     'image' => 'images/about/user4.png',
        //     'modal_image' => 'images/about/user4.png',
        //     'name' => 'Ashutosh Dey',
        //     'title' => 'Executive Director, Capacity Building & Organization Development | Top Outsourcing Partners',
        //     'description' => 'Ashutosh Dey is the Executive Director, Capacity Building & Organization Development at Top Outsourcing Partners (TOP). In this role, Ashutosh leads the company\'s efforts in building organizational capacity and developing programs that enhance employee performance and leadership.',
        //     'education' => [
        //         'Master's in Business Administration (MBA)',
        //         'Certifications in Organizational Development and Change Management'
        //     ],
        //     'expertise' => [
        //         'Capacity building',
        //         'Strategic planning',
        //         'Organizational transformation',
        //         'Change management',
        //         'Talent development'
        //     ],
        //     'vision' => 'To foster a learning culture and help organizations leverage their human capital to meet future challenges.',
        //     'is_principal' => 0,
        // ]);

        // TeamMember::create([
        //     'id' => 5,
        //     'image' => 'images/about/user5.png',
        //     'modal_image' => 'images/about/user5.png',
        //     'name' => 'Khurshid Almeher',
        //     'title' => 'Executive Director, Project Management & Enterprise Transformation | Top Outsourcing Partners',
        //     'description' => 'Khurshid Almeher is the Executive Director, Project Management & Enterprise Transformation at Top Outsourcing Partners (TOP). In this role, Khurshid leads the company\'s project management initiatives and oversees the implementation of enterprise transformation strategies to help clients achieve operational excellence and sustainable growth.',
        //     'education' => [
        //         'Master's in Business Administration (MBA)',
        //         'Certifications in Project Management Professional (PMP) and Lean Six Sigma'
        //     ],
        //     'expertise' => [
        //         'Project management',
        //         'Enterprise transformation',
        //         'Process optimization',
        //         'Strategic planning',
        //         'Digital transformation'
        //     ],
        //     'vision' => 'To drive transformative results by leveraging technology and data for operational excellence and sustainable growth.',
        //     'is_principal' => 0,
        // ]);

        // TeamMember::create([
        //     'id' => 6,
        //     'image' => 'images/about/user6.png',
        //     'modal_image' => 'images/about/user6.png',
        //     'name' => 'Nirmal Roy',
        //     'title' => 'Executive Director, Partnership & Engagement | Top Outsourcing Partners',
        //     'description' => 'Nirmal Roy serves as the Executive Director, Partnership & Engagement at Top Outsourcing Partners. Nirmal has over 15 years of experience in corporate finance, strategic consulting, and supply chain management.',
        //     'education' => [
        //         'Bachelor's Degree in Commerce'
        //     ],
        //     'expertise' => [
        //         'Corporate finance',
        //         'Strategic consulting',
        //         'Supply chain management',
        //         'Budgetary control',
        //         'Business development'
        //     ],
        //     'vision' => 'To build impactful partnerships and deliver cost-effective outsourcing solutions that enhance client satisfaction and drive business growth.',
        //     'is_principal' => 0,
        // ]);

        TeamMember::create([
            'id' => 7,
            'image' => 'images/about/user7.png',
            'modal_image' => 'images/about/user7.png',
            'name' => 'Barna Paul',
            'title' => 'Chief Finance Officer | Top Outsourcing Partners',
            'description' => 'Barna Paul is the Chief Finance Officer at Top Outsourcing Partners (TOP), overseeing all financial operations and ensuring the company\'s financial health and sustainability.',
            'education' => [
                'MBA in Finance',
                'BBA in Accounting'
            ],
            'expertise' => [
                'Financial reporting',
                'Taxation',
                'Corporate governance',
                'Strategic planning',
                'Cost optimization'
            ],
            'vision' => 'To drive financial stability and growth while ensuring compliance with global financial standards.',
            'is_principal' => 0,
        ]);

        // TeamMember::create([
        //     'id' => 8,
        //     'image' => 'images/about/user8.png',
        //     'modal_image' => 'images/about/user8.png',
        //     'name' => 'Tanni Biswas',
        //     'title' => 'Chief People Officer | Top Outsourcing Partners',
        //     'description' => 'Tanni Biswas is the Chief People Officer at Top Outsourcing Partners (TOP). Tanni brings over 10 years of experience in human resources, talent management, and organizational development.',
        //     'education' => [
        //         'MBA in Human Resource Management',
        //         'BBA in Business Administration from Dhaka University'
        //     ],
        //     'expertise' => [
        //         'HR strategy',
        //         'Talent management',
        //         'Employee relations',
        //         'Organizational development',
        //         'Workforce planning'
        //     ],
        //     'vision' => 'To create a positive, productive workplace culture and ensure TOP attracts and retains top talent.',
        //     'is_principal' => 0,
        // ]);

        // TeamMember::create([
        //     'id' => 9,
        //     'image' => 'images/about/user9.png',
        //     'modal_image' => 'images/about/user9.png',
        //     'name' => 'Tapan Fouzder',
        //     'title' => 'President, Information & Technology | Top Outsourcing Partners',
        //     'description' => 'Tapan Fouzder is the President of Information & Technology at Top Outsourcing Partners (TOP), where he is responsible for leading the company's technology strategy, delivery, infrastructure, and innovation.',
        //     'education' => [
        //         'Master's in Public Health from State University Bangladesh',
        //         'Bachelor's in Civil Engineering from RUET'
        //     ],
        //     'expertise' => [
        //         'System development',
        //         'Business process automation',
        //         'Data management',
        //         'Cybersecurity',
        //         'Cloud-based infrastructure'
        //     ],
        //     'vision' => 'To leverage emerging technologies to streamline processes and drive organizational growth.',
        //     'is_principal' => 0,
        // ]);

        // TeamMember::create([
        //     'id' => 10,
        //     'image' => 'images/about/user10.png',
        //     'modal_image' => 'images/about/user10.png',
        //     'name' => 'Jubaida Begum',
        //     'title' => 'Chief Marketing Officer | Top Outsourcing Partners',
        //     'description' => 'Jubaida Begum is the Chief Marketing Officer at Top Outsourcing Partners (TOP). She leads the global marketing efforts, focusing on building the TOP brand and driving customer demand across diverse markets.',
        //     'education' => [
        //         'MBA in Marketing from IBA, Dhaka University',
        //         'MSc and BSc in Mathematics from Dhaka University'
        //     ],
        //     'expertise' => [
        //         'Strategic planning',
        //         'Market development',
        //         'Brand management',
        //         'Media planning',
        //         'Crisis management'
        //     ],
        //     'vision' => 'To create innovative marketing campaigns that resonate with audiences and generate long-term growth.',
        //     'is_principal' => 0,
        // ]);

        // TeamMember::create([
        //     'id' => 11,
        //     'image' => 'images/about/user11.png',
        //     'modal_image' => 'images/about/user11.png',
        //     'name' => 'Anisuzzaman',
        //     'title' => 'Chief Business Development Officer | Top Outsourcing Partners',
        //     'description' => 'Anisuzzaman is the Chief Business Development Officer at Top Outsourcing Partners (TOP). In this role, he is responsible for driving new business, partnerships, and developing long-term strategies to ensure sustained business growth.',
        //     'education' => [
        //         'MBA in Management Information Systems from University of Dhaka',
        //         'BBA from Khulna University'
        //     ],
        //     'expertise' => [
        //         'B2B business development',
        //         'Sales strategy',
        //         'Client relationship management',
        //         'Digital transformation',
        //         'Process optimization'
        //     ],
        //     'vision' => 'To drive sustained business growth through strategic partnerships and innovative solutions.',
        //     'is_principal' => 0,
        // ]);

        // TeamMember::create([
        //     'id' => 12,
        //     'image' => 'images/about/user12.png',
        //     'modal_image' => 'images/about/user12.png',
        //     'name' => 'S M Rayhan',
        //     'title' => 'Chief Strategy and Business Operations Officer | Top Outsourcing Partners',
        //     'description' => 'S M Rayhan is the Chief Strategy and Business Operations Officer at Top Outsourcing Partners (TOP), where he leads strategic planning, business operations, and organizational development to drive the company's continued growth and success.',
        //     'education' => [
        //         'MBA from Khulna University',
        //         'Pursuing Chartered Secretarial Course'
        //     ],
        //     'expertise' => [
        //         'Strategic planning',
        //         'Business operations',
        //         'Telecommunications',
        //         'Mobile financial services',
        //         'Startups'
        //     ],
        //     'vision' => 'To optimize operations and foster innovation for sustainable growth.',
        //     'is_principal' => 0,
        // ]);

        // TeamMember::create([
        //     'id' => 13,
        //     'image' => 'images/about/user13.png',
        //     'modal_image' => 'images/about/user13.png',
        //     'name' => 'Sazal Sarkar',
        //     'title' => 'Chief Legal Officer and Head of Corporate Affairs | Top Outsourcing Partners',
        //     'description' => 'Sazal Sarkar serves as the Chief Legal Officer and Head of Corporate Affairs at TOP Outsourcing Partners (TOP). In this role, Sazal leads the corporate legal team, ensuring compliance with various laws and regulations.',
        //     'education' => [
        //         'LLB and BBA in Management from Jagannath University',
        //         'Professional training in Chartered Accountancy from ICAB'
        //     ],
        //     'expertise' => [
        //         'Business law',
        //         'Taxation law',
        //         'Compliance management',
        //         'Corporate governance',
        //         'Mergers and acquisitions'
        //     ],
        //     'vision' => 'To guide companies through legal challenges and foster sustainable business practices.',
        //     'is_principal' => 0,
        // ]);

        // TeamMember::create([
        //     'id' => 14,
        //     'image' => 'images/about/user14.png',
        //     'modal_image' => 'images/about/user14.png',
        //     'name' => 'Zahirul Quayum',
        //     'title' => 'Chief Product Officer | Top Outsourcing Partners',
        //     'description' => 'Zahirul Quayum is the Chief Product Officer at Top Outsourcing Partners (TOP), responsible for leading product development and shaping the product strategy across the company\'s service portfolio.',
        //     'education' => [
        //         'MBA in Management Information Systems (MIS) from Dhaka University',
        //         'BBA from Khulna University'
        //     ],
        //     'expertise' => [
        //         'Product development',
        //         'Digital transformation',
        //         'Product management',
        //         'IT and outsourcing industries',
        //         'Market alignment'
        //     ],
        //     'vision' => 'To innovate and align product strategies with client needs and market demands.',
        //     'is_principal' => 0,
        // ]);

        // TeamMember::create([
        //     'id' => 15,
        //     'image' => 'images/about/user15.png',
        //     'modal_image' => 'images/about/user15.png',
        //     'name' => 'Abdulla Romman',
        //     'title' => 'Senior Manager - Financial Reporting & Business Compliance | Top Outsourcing Partners',
        //     'description' => 'Abdulla Romman is the Senior Manager - Financial Reporting & Business Compliance at Top Outsourcing Partners (TOP). In this role, he oversees financial reporting, ensuring compliance with industry regulations.',
        //     'education' => [
        //         'Bachelor's degree in Accounting',
        //         'Pursuing advanced certifications in International Financial Reporting Standards (IFRS)'
        //     ],
        //     'expertise' => [
        //         'Financial reporting',
        //         'Auditing',
        //         'Compliance',
        //         'Internal controls',
        //         'Business process optimization'
        //     ],
        //     'vision' => 'To enhance operational efficiencies and ensure adherence to financial regulations.',
        //     'is_principal' => 0,
        // ]);

        // TeamMember::create([
        //     'id' => 16,
        //     'image' => 'images/about/user16.png',
        //     'modal_image' => 'images/about/user16.png',
        //     'name' => 'Abu Saleh MD Moin',
        //     'title' => 'Manager - Client Management | Top Outsourcing Partners',
        //     'description' => 'Abu Saleh MD Moin is the Manager - Client Management at TOP Outsourcing Partners (TOP). In this role, he is responsible for overseeing client relationships and ensuring seamless communication.',
        //     'education' => [
        //         'Bachelor's degree in Business Administration'
        //     ],
        //     'expertise' => [
        //         'Client management',
        //         'Account management',
        //         'Client retention',
        //         'Service delivery',
        //         'Operational excellence'
        //     ],
        //     'vision' => 'To foster long-term partnerships through client-centric strategies.',
        //     'is_principal' => 0,
        // ]);

        // TeamMember::create([
        //     'id' => 17,
        //     'image' => 'images/about/user17.png',
        //     'modal_image' => 'images/about/user17.png',
        //     'name' => 'Md. Sojib Hossain',
        //     'title' => 'Manager - Accounting & Assurance | Top Outsourcing Partners',
        //     'description' => 'Md. Sojib Hossain is the Manager of Accounting & Assurance at Top Outsourcing Partners (TOP). In this role, he leads tax compliance, financial reporting, and business advisory services.',
        //     'education' => [
        //         'Bachelor's degree in Business Administration (BBA) from the National University'
        //     ],
        //     'expertise' => [
        //         'Accounting',
        //         'Tax compliance',
        //         'Financial reporting',
        //         'Business advisory',
        //         'Process optimization'
        //     ],
        //     'vision' => 'To streamline financial operations and ensure regulatory adherence for business growth.',
        //     'is_principal' => 0,
        // ]);
        // TeamMember::create([
        //     'id' => 18,
        //     'image' => 'images/about/user18.png',
        //     'modal_image' => 'images/about/user18.png',
        //     'name' => 'Md. Imdadul Islam',
        //     'title' => 'Director, Lead - Partnership & Engagement Advisory | Top Outsourcing Partners',
        //     'description' => 'Md. Imdadul Islam is the Director, Lead - Partnership & Engagement Advisory at Top Outsourcing Partners (TOP). In this role, Imdadul spearheads the development of strategic alliances, drives client engagement initiatives, and fosters business relationships that enable sustainable growth and innovation for clients across industries.',
        //     'education' => [
        //         'Bachelor's in Finance & Banking (Jahangirnagar University)'
        //     ],
        //     'expertise' => [
        //         'Partnership Development',
        //         'Client Relationship Management',
        //         'Strategic Engagement Advisory',
        //         'Business Growth Strategy',
        //         'Cross-Functional Collaboration'
        //     ],
        //     'vision' => 'To build impactful partnerships through trust, transparency, and tailored engagement strategies that empower organizations to scale efficiently and achieve long-term success.',
        //     'is_principal' => 0,
        // ]);
    }
}