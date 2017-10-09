<div class="alert alert-warning" role="alert">
   <strong><i>Hinweis:</strong></i> Das Sofort-Plugin ist für die Nutzung mit dem Webshop Ceres entwickelt und funktioniert nur mit dessen Logikstruktur oder anderen Template-Plugins. 
</div>

# Sofort. – Bargeldloses Bezahlen in plentymarkets Online-Shops

Mit diesem Plugin binden Sie das Direkt-Überweisungsverfahren **Sofort.** in Ihren Webshop ein.

## Sofort-Konto eröffnen

Bevor Sie die Zahlungsart in plentymarkets einrichten können, ist die [Eröffnung eines Geschäftskontos bei Sofort](https://www.sofort.com/payment/users/register) erforderlich. Sie erhalten dann Informationen sowie Zugangsdaten, die Sie für die Einrichtung in plentymarkets benötigen.

## Plugin-Installation

Bevor das Modul verwendet werden kann, muss dieses in plentymarkets installiert werden.

**Installation des Sofort-Plugins via plentyMarketplace:**

1. [plentyMarketplace](https://marketplace.plentymarkets.com/) im Browser aufrufen
2. Finden Sie das Plugin unter **Payment** → **Sofort**
3. **Go to checkout** (Login) und den Einkauf bestätigen
4. Backend vom Shop aufrufen
5. Menü **Plugins » Purchases** öffnen
6. Schaltfläche **Install** für das Sofort-Plugin betätigen

**Installation des Sofort-Plugins via GIT:**

1. Menü **Plugins » Git** öffnen
2. **New Plugin** auswählen. Es öffnet sich das Fenster **Settings**.
3. Verbinden Sie Ihren GitHub-Zugang und tragen Sie **User Name** und **Password** ein
4. Tragen Sie die Remote-URL des Sofort-Plugins ein: <https://github.com/frontend-studios/plugin-payment-sofort.git>
5. Aktivieren Sie **Auto fetch**
6. Abschließend speichern mit **Save**

## Sofort in plentymarkets einrichten

Bevor Sie die Funktionen des Sofort-Plugins nutzen können, müssen Sie zuerst Ihr Sofort-Konto mit Ihrem plentymarkets System verbinden.

##### Sofort-Konto anbinden:
  
1. Öffnen Sie das Menü **Plugins » Übersicht**.
2. Klicken Sie auf das Plugin **Sofort** und wählen dann **Konfiguration**.
3. Geben Sie den Konfigurationsschlüssel ein.  
	→ Diesen Schlüssel erhalten Sie durch den Registrierungsprozess.
4. Nehmen Sie weitere Einstellungen nach Bedarf im Reiter **Erweiterte Einstellungen** vor.
5. Sofern Sie eine automatisierte Rückzahlung (s.u.) einrichten möchten, tragen Sie im Reiter **Händlereinstellungen** Ihre Bankverbindung ein.
6. Speichern Sie die Einstellungen ab.

<table>
  <caption>Tab. 1: Sofort-Plugineinstellungen / Grundeinstellungen</caption>
  <thead>
    <th>
      Einstellung
    </th>
    <th>
      Erläuterung
    </th>
  </thead>
  <tbody>
    <tr>
      <td>
        <b>Zahlungsart aktivieren</b>
      </td>
      <td><b>Standard:</b> <i>Nein</i>
      </td>
    </tr>
    <tr>
      <td>
        <b>Konfigurationsschlüssel</b>
      </td>
      <td><strong><i>Wichtig:</i></strong> Den Konfigurationsschlüssel erhalten Sie nach der Registrierung (https://www.sofort.com/payment/users/register).
      <br />Ohne korrekte Eingabe wird die Zahlungsart nicht aktiviert.
      <br />Beispiel für den Aufbau des Konfigurationsschlüssels:
      <br />{Kundennummer}:{Projekt-ID}:{API-Key}
      </td>
    </tr>
  </tbody>
</table>

<table>
  <caption>Tab. 2: Sofort-Plugineinstellungen / Erweiterte Einstellungen</caption>
  <thead>
    <th>
      Einstellung
    </th>
    <th>
      Erläuterung
    </th>
  </thead>
  <tbody>
    <tr>
      <td>
        <b>Verwendungszweck (Zeile 1) *Pflichtangabe</b>
      </td>
      <td>
        Legt den Text fest, der als Verwendungszweck bei der Überweisung angegeben wird (max. 27 Zeichen - Sonderzeichen werden ersetzt/gelöscht). Folgende Platzhalter werden mit konkreten Werten ersetzt:<br />
        {{transaction_id}} => Transaktions-ID der Überweisung<br />
        {{customer_name}} => Name des Endkunden<br />
        {{customer_email}} => E-Mail Adresse des Endkunden<br />
        <b>Standard:</b> <i>{{transaction_id}}</i>
      </td>
    </tr>
    <tr>
      <td>
        <b>Verwendungszweck (Zeile 2)</b>
      </td>
      <td>
        <i>s. Verwendungszweck 1</i><br />
        Zusätzlich sind folgende Platzhalter möglich:<br />
        {{customer_id}} => Endkundennummer<br />
        {{customer_company}} => Firmenname des Endkunden<br />
        <b>Standard:</b> <i>-</i>
      </td>
    </tr>
  </tbody>
</table>

<table>
  <caption>Tab. 3: Sofort-Plugineinstellungen / Händlereinstellungen</caption>
  <thead>
    <th>
      Einstellung
    </th>
    <th>
      Erläuterung
    </th>
  </thead>
  <tbody>
    <tr>
      <td>
        <b>Kontoinhaber</b>
      </td>
      <td>
        Händler Kontoinhaber
        <br /><b>Standard:</b> -
      </td>
    </tr>
    <tr>
      <td>
        <b>IBAN</b>
      </td>
      <td>
        Händler IBAN	
        <br /><b>Standard:</b> -
      </td>
    </tr>
    <tr>
      <td>
        <b>BIC</b>
      </td>
      <td>
        Händler BIC
        <br /><b>Standard:</b> -
      </td>
    </tr>
  </tbody>
</table>

## Zahlungsarten verwalten

In diesem Abschnitt erfahren Sie, wie Sie die Zahlungsart in Ihrem Webshop anbieten.

### Sofort. aktivieren

Nachdem Sie das Sofort-Plugin installiert haben, müssen Sie in der Konfiguration in der Grundeinstellung das Plugin aktivieren und mindestens den Konfigurationsschlüssel setzen.
Danach ist Sofort. ohne weitere Einstellungen als Zahlungsart verfügbar. Diese Zahlungsart erscheint in der Kaufabwicklung je nach Priorität neben den anderen aktivierten Zahlungsarten.

## Sofort-Zahlung automatisch zurückzahlen

Richten Sie eine Ereignisaktion ein, um die Rückzahlung einer Zahlung über Sofort. zu automatisieren.

<div class="alert alert-warning" role="alert">
   <strong><i>Wichtig:</i></strong> Automatische Rückzahlungen stehen nur Händlern mit einem Konto bei der Deutschen Handelsbank (DHB) zur Verfügung. 
</div>

Weitere Informationen zu Rückbuchungen stehen Ihnen über das [Integration Center](https://www.sofort.com/integrationCenter-eng-DE/content/view/full/3363) zur Verfügung. 

##### Ereignisaktion einrichten:

1. Öffnen Sie das Menü **Plugins » Übersicht**.
2. Klicken Sie auf das Plugin **Sofort** und wählen dann **Konfiguration**.
3. Tragen Sie im Reiter **Händlereinstellungen** Ihre Bankverbindung ein.
4. Öffnen Sie das Menü **Einstellungen » Aufträge » Ereignisaktionen**.
5. Klicken Sie auf **Ereignisaktion hinzufügen**.
→ Das Fenster **Neue Ereignisaktion erstellen** wird geöffnet.
6. Geben Sie einen Namen ein.
7. Wählen Sie das Ereignis gemäß Tabelle 4.
8. **Speichern** Sie die Einstellungen.
9. Nehmen Sie die Einstellungen gemäß Tabelle 4 vor.
10. Setzen Sie ein Häkchen bei **Aktiv**.
11. **Speichern** Sie die Einstellungen.

<table>
  <thead>
    <th>
      Einstellung
    </th>
    <th>
      Option
    </th>
    <th>
      Auswahl
    </th>
  </thead>
  <tbody>
    <tr>
      <td><strong>Ereignis</strong></td>
      <td><strong>Das Ereignis wählen, nach dem eine Rückzahlung erfolgen soll.</strong></td>
      <td></td>
    </tr>
    <tr>
      <td><strong>Filter 1</strong></td>
      <td><strong>Auftrag > Zahlungsart</strong></td>
      <td><strong>Plugin: Sofort</strong></td>
    </tr>
    <tr>
      <td><strong>Aktion</strong></td>
      <td><strong>Plugin > Rückerstattung der Sofort-Zahlung</strong></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
  <caption>
    Tab. 4: Ereignisaktion zur automatischen Rückzahlung der Sofort-Zahlung
  </caption>
</table>
