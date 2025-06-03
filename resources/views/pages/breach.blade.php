@extends('layouts.app')

@section('content')
<div class="privacy-container py-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1 class="text-center mb-5">DATA BREACH POLICY & PROCEDURES</h1>

            <h2 class="mt-5 mb-3 text-start">1. Policy Statement</h2>
            <p class="lead">Top Outsourcing Partners (TOP, "we", "our", or "the Company") are committed to our obligations under the regulatory system and in accordance with the GDPR. We maintain a structured program for compliance and monitoring, conduct frequent risk assessments, and ensure that personal data is protected through defined measures and controls. This policy outlines our strategy for handling data breaches.</p>

            <h2 class="mt-5 mb-3 text-start">2. Purpose</h2>
            <p class="lead">This policy defines our objectives and procedures for managing personal data breaches. It ensures staff understand their responsibilities, the steps for reporting, investigating, and notifying breaches, and aligns our practices with GDPR and regulatory requirements.</p>

            <h2 class="mt-5 mb-3 text-start">3. Scope</h2>
            <p class="lead">This policy applies to all employees, contractors, agents, interns, and third parties engaged with TOP in any location. Adherence is mandatory, and violations may lead to disciplinary actions.</p>

            <h2 class="mt-5 mb-3 text-start">4. Data Security & Breach Requirements</h2>
            <p class="lead">A personal data breach is any incident that leads to unauthorized destruction, loss, alteration, or disclosure of personal data. Our measures include:</p>
            <ul class="text-start">
                <li>Pseudonymization and encryption</li>
                <li>Access controls and biometric security</li>
                <li>Regular audits, disaster recovery, and resilience plans</li>
                <li>Mandatory training and knowledge assessments</li>
                <li>Secure review of data transfers and disposals</li>
            </ul>

            <h3 class="mt-4 mb-2 text-start">4.1 Objectives</h3>
            <ul class="text-start">
                <li>Ensure compliance with GDPR and UK Data Protection laws</li>
                <li>Maintain effective breach prevention and response procedures</li>
                <li>Notify authorities and individuals when required</li>
                <li>Maintain breach logs for analysis and prevention</li>
                <li>Protect the privacy and identity of data subjects</li>
            </ul>

            <h2 class="mt-5 mb-3 text-start">5. Data Breach Procedures & Guidelines</h2>
            <p class="lead">TOP implements strong breach prevention controls and has structured processes to handle breaches promptly and effectively.</p>

            <h3 class="mt-4 mb-2 text-start">5.1 Breach Monitoring & Reporting</h3>
            <p class="lead">All breaches are reported immediately to the Data Protection Officer or the designated compliance entity (e.g., RCM Group Consulting). Each incident is recorded and investigated, even if no formal notification is required.</p>

            <h3 class="mt-4 mb-2 text-start">5.2 Breach Incident Procedures</h3>
            <p class="lead">Upon identification, breaches must be reported without delay. Containment actions are initiated immediately. Each incident is documented using our Breach Incident Form and reviewed by the compliance team.</p>

            <h3 class="mt-4 mb-2 text-start">5.3 Breach Risk Assessment</h3>
            <h4 class="mt-3 mb-2 text-start">5.3.1 Human Error</h4>
            <ul class="text-start">
                <li>Root cause analysis conducted</li>
                <li>Employee retraining or disciplinary action</li>
                <li>Procedure revision to prevent recurrence</li>
            </ul>
            <h4 class="mt-3 mb-2 text-start">5.3.2 System Error</h4>
            <ul class="text-start">
                <li>IT and compliance team investigate root cause</li>
                <li>Actions may include:</li>
                <ul>
                    <li>Recovering lost data</li>
                    <li>Shutting down systems</li>
                    <li>Resetting passwords</li>
                    <li>Using backups for restoration</li>
                </ul>
            </ul>
            <h4 class="mt-3 mb-2 text-start">5.3.3 Risk Investigation & Documentation</h4>
            <p class="lead text-start">The lead investigator documents:</p>
            <ul class="text-start">
                <li>Type and sensitivity of data</li>
                <li>What protections existed (e.g., encryption)</li>
                <li>Final data location and access status</li>
                <li>Broader implications and resolutions</li>
            </ul>

            <h2 class="mt-5 mb-3 text-start">6. Breach Notifications</h2>
            <p class="lead">TOP complies with legal reporting timelines and ensures communication with regulatory bodies and affected individuals where appropriate.</p>

            <h3 class="mt-4 mb-2 text-start">6.1 Supervisory Authority Notification</h3>
            <ul class="text-start">
                <li>If required, TOP notifies the Supervisory Authority within 72 hours, including:</li>
                <ul>
                    <li>Breach description</li>
                    <li>Number and category of affected data subjects and records</li>
                    <li>Contact details for the DPO</li>
                    <li>Consequences and mitigation actions</li>
                </ul>
            </ul>

            <h3 class="mt-4 mb-2 text-start">6.2 Data Subject Notification</h3>
            <ul class="text-start">
                <li>When high risk to individuals exists, data subjects are notified promptly. Includes:</li>
                <ul>
                    <li>Nature of breach</li>
                    <li>Contact details</li>
                    <li>Consequences and mitigation actions</li>
                </ul>
                <li>Exceptions: If data is encrypted or risk is mitigated, notice may not be required. Public communication may be used if direct notice is impractical.</li>
            </ul>

            <h2 class="mt-5 mb-3 text-start">7. Record Keeping</h2>
            <h3 class="lead">All breach records are retained for 6 years. Monthly reviews identify trends and prevent future incidents.</h3>

            <h2 class="mt-5 mb-3 text-start">8. Responsibilities</h2>
            <ul class="text-start">
                <li>All staff receive training and support</li>
                <li>Designated compliance entities (e.g., RCM Group Consulting) conduct audits</li>
                <li>Processes include feedback and continuous improvement</li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
