@extends('layouts.app')

@section('title', 'Data Breach Policy & Procedures - Top Outsourcing Partners | Security & Compliance')
@section('meta_description', 'Learn about Top Outsourcing Partners Data Breach Policy and Procedures. Understand our commitment to data security, incident response protocols, notification procedures, and compliance with GDPR and data protection regulations.')
@section('meta_keywords', 'data breach policy, security procedures, incident response, data protection, GDPR compliance, data security, breach notification, security protocols')

@section('content')
<div class="policy-container">
    <div class="policy-content">
        <h1>DATA BREACH POLICY & PROCEDURES</h1>

        <h2>1. Policy Statement</h2>
        <p>
            Top Outsourcing Partners (TOP, "we", "our", or "the Company") are committed to our obligations under the regulatory system and in accordance with the GDPR. 
            We maintain a structured program for compliance and monitoring, conduct frequent risk assessments, and ensure that personal data is protected through defined measures and controls. 
            This policy outlines our strategy for handling data breaches.
        </p>

        <h2>2. Purpose</h2>
        <p>
            This policy defines our objectives and procedures for managing personal data breaches. 
            It ensures staff understand their responsibilities, the steps for reporting, investigating, and notifying breaches, 
            and aligns our practices with GDPR and regulatory requirements.
        </p>

        <h2>3. Scope</h2>
        <p>
            This policy applies to all employees, contractors, agents, interns, and third parties engaged with TOP in any location. 
            Adherence is mandatory, and violations may lead to disciplinary actions.
        </p>

        <h2>4. Data Security & Breach Requirements</h2>
        <p>
            A personal data breach is any incident that leads to unauthorized destruction, loss, alteration, or disclosure of personal data. 
            Our measures include:
        </p>
        <ul>
            <li>Pseudonymization and encryption</li>
            <li>Access controls and biometric security</li>
            <li>Regular audits, disaster recovery, and resilience plans</li>
            <li>Mandatory training and knowledge assessments</li>
            <li>Secure review of data transfers and disposals</li>
        </ul>

        <h3>4.1 Objectives</h3>
        <ul>
            <li>Ensure compliance with GDPR and UK Data Protection laws</li>
            <li>Maintain effective breach prevention and response procedures</li>
            <li>Notify authorities and individuals when required</li>
            <li>Maintain breach logs for analysis and prevention</li>
            <li>Protect the privacy and identity of data subjects</li>
        </ul>

        <h2>5. Data Breach Procedures & Guidelines</h2>
        <p>
            TOP implements strong breach prevention controls and has structured processes to handle breaches promptly and effectively.
        </p>

        <h3>5.1 Breach Monitoring & Reporting</h3>
        <p>
            All breaches are reported immediately to the Data Protection Officer or the designated compliance entity (e.g., RCM Group Consulting). 
            Each incident is recorded and investigated, even if no formal notification is required.
        </p>

        <h3>5.2 Breach Incident Procedures</h3>
        <p>
            Upon identification, breaches must be reported without delay. Containment actions are initiated immediately. 
            Each incident is documented using our Breach Incident Form and reviewed by the compliance team.
        </p>

        <h3>5.3 Breach Risk Assessment</h3>
        <h4>5.3.1 Human Error</h4>
        <ul>
            <li>Root cause analysis conducted</li>
            <li>Employee retraining or disciplinary action</li>
            <li>Procedure revision to prevent recurrence</li>
        </ul>

        <h4>5.3.2 System Error</h4>
        <ul>
            <li>IT and compliance team investigate root cause</li>
            <li>Actions may include:</li>
            <ul>
                <li>Recovering lost data</li>
                <li>Shutting down systems</li>
                <li>Resetting passwords</li>
                <li>Using backups for restoration</li>
            </ul>
        </ul>

        <h4>5.3.3 Risk Investigation & Documentation</h4>
        <p>The lead investigator documents:</p>
        <ul>
            <li>Type and sensitivity of data</li>
            <li>What protections existed (e.g., encryption)</li>
            <li>Final data location and access status</li>
            <li>Broader implications and resolutions</li>
        </ul>

        <h2>6. Breach Notifications</h2>
        <p>
            TOP complies with legal reporting timelines and ensures communication with regulatory bodies and affected individuals where appropriate.
        </p>

        <h3>6.1 Supervisory Authority Notification</h3>
        <ul>
            <li>If required, TOP notifies the Supervisory Authority within 72 hours, including:</li>
            <ul>
                <li>Breach description</li>
                <li>Number and category of affected data subjects and records</li>
                <li>Contact details for the DPO</li>
                <li>Consequences and mitigation actions</li>
            </ul>
        </ul>

        <h3>6.2 Data Subject Notification</h3>
        <ul>
            <li>When high risk to individuals exists, data subjects are notified promptly. Includes:</li>
            <ul>
                <li>Nature of breach</li>
                <li>Contact details</li>
                <li>Consequences and mitigation actions</li>
            </ul>
            <li>Exceptions: If data is encrypted or risk is mitigated, notice may not be required. 
                Public communication may be used if direct notice is impractical.
            </li>
        </ul>

        <h2>7. Record Keeping</h2>
        <p>All breach records are retained for 6 years. Monthly reviews identify trends and prevent future incidents.</p>

        <h2>8. Responsibilities</h2>
        <ul>
            <li>All staff receive training and support</li>
            <li>Designated compliance entities (e.g., RCM Group Consulting) conduct audits</li>
            <li>Processes include feedback and continuous improvement</li>
        </ul>
    </div>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
