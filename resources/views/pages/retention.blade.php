@extends('layouts.app')

@section('content')
<div class="privacy-container py-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1 class="text-center mb-5">DATA RETENTION &amp; ERASURE POLICY</h1>

            <h2 class="mt-5 mb-3 text-start">1. Policy Statement</h2>
            <p class="lead">Top Outsourcing Partners (&quot;TOP&quot;, &quot;we&quot;, &quot;our&quot;, or &quot;the Company&quot;) recognizes that effective data and records management is vital to fulfilling business objectives, meeting compliance standards, protecting personal data, and ensuring operational excellence.</p>
            <p class="lead">This policy aligns with global best practices and aims to:</p>
            <ul class="text-start">
                <li>Support structured and efficient business operations</li>
                <li>Ensure regulatory, statutory, and contractual compliance</li>
                <li>Protect sensitive and personal data through responsible handling</li>
                <li>Enable transparent and accountable document management</li>
                <li>Improve information flow and evidence-based decision-making</li>
            </ul>

            <h2 class="mt-5 mb-3 text-start">2. Purpose</h2>
            <p class="lead">This policy outlines TOP’s intent to implement structured, secure, and compliant management of data and records, both physical and digital. It governs how data is created, received, maintained, stored, and destroyed, ensuring its integrity and regulatory conformity.</p>

            <h2 class="mt-5 mb-3 text-start">3. Scope</h2>
            <p class="lead text-start ps-0 ms-0">This policy applies to:</p>
            <ul class="text-start">
                <li>All permanent, temporary, contractual, and third-party staff</li>
                <li>Interns, volunteers, agents, and contractors</li>
                <li>All physical and electronic records maintained by TOP</li>
                <li>Operations conducted globally under TOP&#39;s name</li>
            </ul>
            <p class="lead text-start ps-0 ms-0">Non-compliance may result in disciplinary action.</p>

            <h2 class="mt-5 mb-3 text-start">4. Legal Context (GDPR Alignment)</h2>
            <p class="lead text-start ps-0 ms-0">We collect personal data such as:</p>
            <ul class="text-start">
                <li>Full names, addresses, DOB, ID numbers</li>
                <li>IP addresses, sensitive and financial data</li>
                <li>Employment details, communication records</li>
            </ul>
            <p class="lead text-start ps-0 ms-0">The collection is lawful, necessary for business functions, and aligned with GDPR and other privacy laws.</p>

            <h2 class="mt-5 mb-3 text-start">5. Objectives</h2>
            <p class="lead text-start ps-0 ms-0">TOP ensures data and records are:</p>
            <ul class="text-start">
                <li>Properly created and captured</li>
                <li>Stored securely</li>
                <li>Used responsibly</li>
                <li>Archived or destroyed based on classification and regulation</li>
            </ul>
            <p class="lead text-start ps-0 ms-0">We emphasize compliance, data authenticity, controlled access, and robust documentation.</p>

            <h2 class="mt-5 mb-3 text-start">6. Guidelines &amp; Procedures</h2>
            <h3 class="mt-4 mb-2 text-start">6.1 Retention Period Protocol</h3>
            <p class="lead text-start ps-0 ms-0">We periodically review all retained data to assess:</p>
            <ul class="text-start">
                <li>Purpose and lawful basis for storage</li>
                <li>Accuracy and relevance</li>
                <li>Type of data subject</li>
                <li>Retention obligations by law or contract</li>
            </ul>
            <p class="lead text-start ps-0 ms-0">Movement and access logs are maintained. Destruction follows regulatory standards.</p>

            <h3 class="mt-4 mb-2 text-start">6.2 Designated Owners</h3>
            <p class="lead text-start ps-0 ms-0">Each system and record is assigned to an Information Asset Owner (IAO) who:</p>
            <ul class="text-start">
                <li>Oversees data through its lifecycle</li>
                <li>Approves all access, review, and deletion</li>
                <li>Is listed on the central Retention Register</li>
            </ul>

            <h3 class="mt-4 mb-2 text-start">6.3 Document Classification</h3>
            <p class="lead text-start ps-0 ms-0">We classify all data into five levels:</p>
            <ul class="text-start">
                <li>Unclassified: Low-value or temporary data with no sensitive content</li>
                <li>Public: Publicly available data with no confidentiality requirement</li>
                <li>Internal: Internal operational data with limited external exposure</li>
                <li>Personal: Personally identifiable data protected by law</li>
                <li>Confidential: High-risk, restricted data requiring strict handling</li>
            </ul>

            <h3 class="mt-4 mb-2 text-start">6.4 Suspension for Legal Holds</h3>
            <p class="lead text-start ps-0 ms-0">In the event of:</p>
            <ul class="text-start">
                <li>Litigation</li>
                <li>Legal notice</li>
                <li>Investigation or audit</li>
            </ul>
            <p class="lead text-start ps-0 ms-0">...record disposal is immediately suspended. A legal hold remains until resolution.</p>

            <h2 class="mt-5 mb-3 text-start">7. Expiration &amp; Disposal</h2>
            <h3 class="mt-4 mb-2 text-start">7.1 Post-Retention Actions</h3>
            <p class="lead text-start ps-0 ms-0">After a record reaches its end-of-life:</p>
            <ul class="text-start">
                <li>It is deleted, archived, or anonymized per GDPR standards</li>
                <li>Any retention extensions are documented by the IAO</li>
            </ul>

            <h4 class="mt-3 mb-2 text-start">7.1.1 Paper Records</h4>
            <ul class="text-start">
                <li>Disposed securely via onsite shredding</li>
                <li>Confidential bins and shredders are available across all facilities</li>
            </ul>

            <h4 class="mt-3 mb-2 text-start">7.1.2 Electronic Records</h4>
            <ul class="text-start">
                <li>Deleted with assistance from the IT Department</li>
                <li>All media are wiped beyond recovery</li>
                <li>Disposal is logged by IAOs for audit trail compliance</li>
            </ul>

            <h4 class="mt-3 mb-2 text-start">7.1.3 Internal Correspondence</h4>
            <ul class="text-start">
                <li>Unless otherwise linked to a formal record, internal memos/emails:</li>
                <ul>
                    <li>Are retained for a maximum of 2 years</li>
                    <li>Are deleted/shredded once their use ends</li>
                </ul>
            </ul>

            <h2 class="mt-5 mb-3 text-start">8. Right to Erasure (&quot;Right to be Forgotten&quot;)</h2>
            <p class="lead text-start ps-0 ms-0">Individuals may request data erasure under GDPR if:</p>
            <ul class="text-start">
                <li>Data is no longer needed</li>
                <li>Consent is withdrawn</li>
                <li>Processing is unlawful</li>
                <li>There is no overriding legal basis</li>
            </ul>
            <p class="lead text-start ps-0 ms-0">TOP will:</p>
            <ul class="text-start">
                <li>Validate each request</li>
                <li>Fulfill deletion where applicable</li>
                <li>Inform the requester if deletion is not possible due to legal or operational obligations</li>
            </ul>

            <h3 class="mt-4 mb-2 text-start">8.1 Special Category Data</h3>
            <p class="lead text-start ps-0 ms-0">For sensitive data, TOP ensures:</p>
            <ul class="text-start">
                <li>A documented retention policy is in place</li>
                <li>Erasure requests are reviewed by DPO, IT, and Department Heads</li>
                <li>Justification and safeguards follow Schedule 1, Part 4 of the UK Data Protection Bill</li>
            </ul>

            <h2 class="mt-5 mb-3 text-start">9. Compliance &amp; Monitoring</h2>
            <ul class="text-start">
                <li>Regular internal audits are conducted</li>
                <li>IAOs must verify retention activity quarterly</li>
                <li>Monitoring ensures that expired records are disposed of and compliance is maintained</li>
            </ul>

            <h2 class="mt-5 mb-3 text-start">10. Roles &amp; Responsibilities</h2>
            <ul class="text-start">
                <li>Heads of Departments: Enforce policy in their domain</li>
                <li>Information Asset Owners (IAOs): Maintain registers, authorize disposal</li>
                <li>DPO: Ensures compliance with data protection law</li>
                <li>Employees: Maintain accuracy and completeness of records they handle</li>
            </ul>
            <h2 class="mt-5 mb-3 text-start">Document Classification Levels</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Classification</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Unclassified</td>
                            <td>Low-value or temporary data with no sensitive content</td>
                        </tr>
                        <tr>
                            <td>Public</td>
                            <td>Publicly available data with no confidentiality requirement</td>
                        </tr>
                        <tr>
                            <td>Internal</td>
                            <td>Internal operational data with limited external exposure</td>
                        </tr>
                        <tr>
                            <td>Personal</td>
                            <td>Personally identifiable data protected by law</td>
                        </tr>
                        <tr>
                            <td>Confidential</td>
                            <td>High-risk, restricted data requiring strict security controls</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
