-- Creates numerous athletes
INSERT INTO athletes (id, athlName, dob, gender, nationality, email) VALUES
('1000000000', 'Alex Smith', '1999-06-03', 'M', 'Canadian', 'alexsmith@gmail.com'),
('1000000001', 'Josh Baker', '1998-04-23', 'M', 'British', 'joshbaker@gmail.com'),
('1000000002', 'Jenna Pearson', '2000-09-15', 'F', 'Canadian', 'jpearson@gmail.com'),
('1000000003', 'Matthew Thomas', '2001-01-06', 'M', 'American', 'matthomas@outlook.com'),
('1000000004', 'Anna Parker', '1999-12-15', 'F', 'Canadian', 'annap1999@gmail.com'),
('1000000005', 'Adam Smith', '2000-04-09', 'F', 'French', 'asmith2000@outlook.com'),
('1000000006', 'George Lewis', '2000-05-03', 'M', 'Armenian', 'glewis@gmail.com'),
('1000000007', 'Ava Hughes', '1999-09-30', 'F', 'Canadian', 'avahughes@outlook.cin'),
('1000000008', 'Bob Andrews', '2000-12-05', 'M', 'Canadian', 'bobandrews@gmail.com'),
('1000000009', 'Sean Stilwell', '2000-06-05', 'M', 'Canadian', 'sstil051@uottawa.ca'),
('1000000010', 'John Brian', '1998-09-13', 'M', 'American', 'jbrian98@gmail.com'),
('1000000011', 'Jessica Price', '1999-05-09', 'F', 'Canadian', 'jprice@outlook.com'),
('1000000012', 'Rianna Crawford', '2000-01-27', 'F', 'Canadian', 'rcrawidk@uottawa.ca'),
('1000000013', 'Cassie Brown', '2001-11-15', 'F', 'British', 'casbrown@gmail.com'),
('1000000014', 'Jacob Cook', '2000-12-14', 'M', 'Canadian', 'jcook2000@gmail.com'),
('1000000015', 'Mike Roberts', '1998-07-15', 'M', 'American', 'mike98@outlook.com'),
('1000000016', 'Alexandra Pugh', '2001-02-18', 'F', 'Canadian', 'apugh01@gmail.com'),
('1000000017', 'Alexis Fletcher', '2000-09-18', 'F', 'Canadian', 'afletcher@gmail.com'),
('1000000018', 'Nathan Foster', '2002-06-19', 'M', 'British', 'nfoster@gmail.com'),
('1000000019', 'Gabriel Carpenter', '2000-12-31', 'M', 'Canadian', 'gcarp2000@outlook.com'),
('1000000020', 'Timothy Martin', '1999-06-28', 'M', 'Canadian', 'timmartin@gmail.com'),
('1000000021', 'Justine Blanche', '2000-07-30', 'F', 'French', 'justineb@outlook.com'),
('1000000022', 'Elise Pascal', '1999-08-27', 'F', 'Canadian', 'epascal99@gmail.com'),
('1000000023', 'Patrice Beauvais', '2000-01-30', 'M', 'Canadian', 'pbeauvais@outlook.com'),
('1000000024', 'Alice Patron', '1998-11-28', 'F', 'French', 'alice.patron@gmail.com'),
('1000000025', 'Phillip Jones', '1999-02-02', 'M', 'Canadian', 'pjones99@gmail.com'),
('1000000026', 'Andrew Tyson', '2000-07-15', 'M', 'Canadian', 'andrewtyson2k@gmail.com');


-- Creating contacts for partners or competitions
INSERT INTO contacts(email,name,phone,password) VALUES
('jessiematthews@uottawa.ca', 'Jessie Matthews', '613-453-2051', 'password123'),
('patrickjones@ottawa.ca', 'Patrick Jones', '613-905-2954', 'Password1'),
('jcartier@gatineau.qc.ca', 'Jacques Cartier', '343-507-9032', 'password');

-- Creating several partners that will run competitions
INSERT INTO partners(name, address, contact_email) VALUES
('University of Ottawa', '550 Cumberland St, Ottawa ON', 'jessiematthews@uottawa.ca'),
('City of Ottawa', '110 Laurier Ave W, Ottawa ON', 'patrickjones@ottawa.ca'),
('Ville de Gatineau', '57 chemin de Montréal Ouest, Gatineau QC', 'jcartier@gatineau.qc.ca');

-- Creating competitions that athletes will participate in
INSERT INTO competitions (comp_name, venue, startdate,starttime,duration,max_athletes,events,partner_name,contact_email) VALUES
('The uOttawa Tournament', 'Minto Sports Complex', '2020-03-16', '09:00:00', '04:00:00', 50, 3, 'University of Ottawa', 'jessiematthews@uottawa.ca'),
('The Colonel By Challenge', 'Lees Campus', '2020-05-17', '08:00:00', '10:00:00', 30, 3, 'University of Ottawa', 'jessiematthews@uottawa.ca'),
('Bob Smith Competition', 'Bob Smith Sports Centre', '2020-06-12', '14:30:00', '06:00:00', 10, 2, 'City of Ottawa', 'patrickjones@ottawa.ca'),
('Jeux de Gatineau', 'Centre sportif de Gatineau', '2020-09-13', '11:00:00', '06:00:00', 10, 2, 'Ville de Gatineau', 'jcartier@gatineau.qc.ca');

-- Registering athletes for their preferred events
INSERT INTO registrations (id, comp_name) VALUES
('1000000000', 'The uOttawa Tournament'),
('1000000000', 'Jeux de Gatineau'),
('1000000001', 'The uOttawa Tournament'),
('1000000001', 'Bob Smith Competition'),
('1000000001', 'Jeux de Gatineau'),
('1000000002', 'The uOttawa Tournament'),
('1000000003', 'The uOttawa Tournament'),
('1000000003', 'Bob Smith Competition'),
('1000000004', 'The uOttawa Tournament'),
('1000000004', 'Jeux de Gatineau'),
('1000000005', 'Bob Smith Competition'),
('1000000006', 'The uOttawa Tournament'),
('1000000007', 'The uOttawa Tournament'),
('1000000008', 'The uOttawa Tournament'),
('1000000008', 'Bob Smith Competition'),
('1000000008', 'Jeux de Gatineau'),
('1000000009', 'The uOttawa Tournament'),
('1000000009', 'Jeux de Gatineau'),
('1000000011', 'Jeux de Gatineau'),
('1000000012', 'Jeux de Gatineau'),
('1000000013', 'Bob Smith Competition'),
('1000000013', 'The uOttawa Tournament'),
('1000000014', 'Jeux de Gatineau'),
('1000000015', 'The uOttawa Tournament'),
('1000000015', 'Jeux de Gatineau'),
('1000000016', 'Bob Smith Competition'),
('1000000017', 'The uOttawa Tournament'),
('1000000017', 'Jeux de Gatineau'),
('1000000018', 'The uOttawa Tournament'),
('1000000018', 'Bob Smith Competition'),
('1000000019', 'Jeux de Gatineau'),
('1000000019', 'Bob Smith Competition'),
('1000000020', 'The uOttawa Tournament'),
('1000000020', 'Bob Smith Competition'),
('1000000021', 'The uOttawa Tournament'),
('1000000024', 'The uOttawa Tournament'),
('1000000021', 'Jeux de Gatineau'),
('1000000022', 'Jeux de Gatineau'),
('1000000023', 'Bob Smith Competition'),
('1000000023', 'The uOttawa Tournament'),
('1000000025', 'The uOttawa Tournament'),
('1000000026', 'The uOttawa Tournament'),
('1000000000', 'The Colonel By Challenge'),
('1000000002', 'The Colonel By Challenge'),
('1000000003', 'The Colonel By Challenge'),
('1000000005', 'The Colonel By Challenge'),
('1000000006', 'The Colonel By Challenge'),
('1000000008', 'The Colonel By Challenge'),
('1000000012', 'The Colonel By Challenge'),
('1000000014', 'The Colonel By Challenge'),
('1000000015', 'The Colonel By Challenge'),
('1000000016', 'The Colonel By Challenge'),
('1000000017', 'The Colonel By Challenge'),
('1000000019', 'The Colonel By Challenge'),
('1000000021', 'The Colonel By Challenge');

-- Adding events for our 3 competitions
INSERT INTO events(event_name, comp_name, scoring_type) VALUES
('Speed Skating', 'The uOttawa Tournament', 'Time'),
('100m Sprint', 'The uOttawa Tournament', 'Time'),
('Weightlifting', 'The uOttawa Tournament', 'Weight'),
('Push-ups', 'Bob Smith Competition', 'Reps'),
('Sit-ups', 'Bob Smith Competition', 'Reps'),
('Cycling', 'Jeux de Gatineau', 'Time'),
('Marathon', 'Jeux de Gatineau', 'Time'),
('200m Sprint', 'The Colonel By Challenge', 'Time'),
('Weightlifting', 'The Colonel By Challenge', 'Weight'),
('Pull-ups', 'The Colonel By Challenge', 'Reps');

-- Adding resutls for the Colonel By Challenge
INSERT INTO results (athlete_id, comp_name, event_name, time, reps, weight, tiebreaker1success, tiebreaker2success) VALUES
('1000000000', 'The Colonel By Challenge', '200m Sprint', 00:00:46, null, null, true, true),
('1000000002', 'The Colonel By Challenge', '200m Sprint', 00:00:48, null, null, false, false),
('1000000003', 'The Colonel By Challenge', '200m Sprint', 00:00:49, null, null, false, false),
('1000000005', 'The Colonel By Challenge', '200m Sprint', 00:00:51, null, null, false, false),
('1000000006', 'The Colonel By Challenge', '200m Sprint', 00:00:54, null, null, false, false),
('1000000008', 'The Colonel By Challenge', '200m Sprint', 00:00:46, null, null, true, false),
('1000000012', 'The Colonel By Challenge', '200m Sprint', 00:00:46, null, null, false, false),
('1000000014', 'The Colonel By Challenge', '200m Sprint', 00:00:47, null, null, false, false),
('1000000015', 'The Colonel By Challenge', '200m Sprint', 00:00:49, null, null, false, false),
('1000000016', 'The Colonel By Challenge', '200m Sprint', 00:00:51, null, null, false, false),
('1000000017', 'The Colonel By Challenge', '200m Sprint', 00:00:52, null, null, false, false),
('1000000019', 'The Colonel By Challenge', '200m Sprint', 00:00:53, null, null, false, false),
('1000000021', 'The Colonel By Challenge', '200m Sprint', 00:00:52, null, null, false, false),
('1000000000', 'The Colonel By Challenge', 'Weightlifting', null, null, 132, true, true),
('1000000002', 'The Colonel By Challenge', 'Weightlifting', null, null, 125, false, false),
('1000000003', 'The Colonel By Challenge', 'Weightlifting', null, null, 116, false, false),
('1000000005', 'The Colonel By Challenge', 'Weightlifting', null, null, 118, false, false),
('1000000006', 'The Colonel By Challenge', 'Weightlifting', null, null, 122, false, false),
('1000000008', 'The Colonel By Challenge', 'Weightlifting', null, null, 132, true, false),
('1000000012', 'The Colonel By Challenge', 'Weightlifting', null, null, 130, false, false),
('1000000014', 'The Colonel By Challenge', 'Weightlifting', null, null, 132, false, false),
('1000000015', 'The Colonel By Challenge', 'Weightlifting', null, null, 122, false, false),
('1000000016', 'The Colonel By Challenge', 'Weightlifting', null, null, 126, false, false),
('1000000017', 'The Colonel By Challenge', 'Weightlifting', null, null, 129, false, false),
('1000000019', 'The Colonel By Challenge', 'Weightlifting', null, null, 121, false, false),
('1000000021', 'The Colonel By Challenge', 'Weightlifting', null, null, 126, false, false),
('1000000000', 'The Colonel By Challenge', 'Pull-ups', null, 83, null, true, true),
('1000000002', 'The Colonel By Challenge', 'Pull-ups', null, 78, null, false, false),
('1000000003', 'The Colonel By Challenge', 'Pull-ups', null, 76, null, false, false),
('1000000005', 'The Colonel By Challenge', 'Pull-ups', null, 77, null, false, false),
('1000000006', 'The Colonel By Challenge', 'Pull-ups', null, 73, null, false, false),
('1000000008', 'The Colonel By Challenge', 'Pull-ups', null, 83, null, true, false),
('1000000012', 'The Colonel By Challenge', 'Pull-ups', null, 79, null, false, false),
('1000000014', 'The Colonel By Challenge', 'Pull-ups', null, 80, null, false, false),
('1000000015', 'The Colonel By Challenge', 'Pull-ups', null, 81, null, false, false),
('1000000016', 'The Colonel By Challenge', 'Pull-ups', null, 72, null, false, false),
('1000000017', 'The Colonel By Challenge', 'Pull-ups', null, 82, null, false, false),
('1000000019', 'The Colonel By Challenge', 'Pull-ups', null, 81, null, false, false),
('1000000021', 'The Colonel By Challenge', 'Pull-ups', null, 78, null, false, false);

-- Adding results for the Bob Smith comp
INSERT INTO results(athlete_id, comp_name, event_name, time, reps, weight, tiebreaker1success, tiebreaker2success) VALUES
('1000000001', 'Bob Smith Competition', 'Push-ups', null, 104, null, false, false),
('1000000001', 'Bob Smith Competition', 'Sit-ups', null, 172, null, false, false),
('1000000003', 'Bob Smith Competition', 'Push-ups', null, 109, null, false, false),
('1000000003', 'Bob Smith Competition', 'Sit-ups', null, 179, null, false, false),
('1000000005', 'Bob Smith Competition', 'Push-ups', null, 108, null, false, false),
('1000000005', 'Bob Smith Competition', 'Sit-ups', null, 176, null, false, false),
('1000000008', 'Bob Smith Competition', 'Push-ups', null, 99, null, false, false),
('1000000008', 'Bob Smith Competition', 'Sit-ups', null, 166, null, false, false),
('1000000013', 'Bob Smith Competition', 'Push-ups', null, 103, null, false, false),
('1000000013', 'Bob Smith Competition', 'Sit-ups', null, 169, null, false, false),
('1000000016', 'Bob Smith Competition', 'Push-ups', null, 98, null, false, false),
('1000000016', 'Bob Smith Competition', 'Sit-ups', null, 99, null, false, false),
('1000000018', 'Bob Smith Competition', 'Push-ups', null, 136, null, false, false),
('1000000018', 'Bob Smith Competition', 'Sit-ups', null, 141, null, false, false),
('1000000019', 'Bob Smith Competition', 'Push-ups', null, 143, null, false, false),
('1000000019', 'Bob Smith Competition', 'Sit-ups', null, 127, null, false, false),
('1000000020', 'Bob Smith Competition', 'Push-ups', null, 137, null, false, false),
('1000000020', 'Bob Smith Competition', 'Sit-ups', null, 162, null, false, false),
('1000000023', 'Bob Smith Competition', 'Push-ups', null, 107, null, false, false),
('1000000023', 'Bob Smith Competition', 'Sit-ups', null, 171, null, false, false);


-- Adding results for the uOttawa Tournament
INSERT INTO results(athlete_id, comp_name, event_name, time, reps, weight, tiebreaker1success, tiebreaker2success) VALUES
('1000000000', 'The uOttawa Tournament', 'Speed Skating', '00:07:15', null, null, false, false),
('1000000000', 'The uOttawa Tournament', '100m Sprint', '00:00:33', null, null, false, false),
('1000000000', 'The uOttawa Tournament', 'Weightlifting', null, null, 140, false, false),
('1000000001', 'The uOttawa Tournament', 'Speed Skating', '00:07:10', null, null, false, false),
('1000000001', 'The uOttawa Tournament', '100m Sprint', '00:00:32', null, null, false, false),
('1000000001', 'The uOttawa Tournament', 'Weightlifting', null, null, 138, false, false),
('1000000002', 'The uOttawa Tournament', 'Speed Skating', '00:07:32', null, null, false, false),
('1000000002', 'The uOttawa Tournament', '100m Sprint', '00:00:39', null, null, false, false),
('1000000002', 'The uOttawa Tournament', 'Weightlifting', null, null, 142, false, false),
('1000000003', 'The uOttawa Tournament', 'Speed Skating', '00:07:15', null, null, false, false),
('1000000003', 'The uOttawa Tournament', '100m Sprint', '00:00:33', null, null, false, false),
('1000000003', 'The uOttawa Tournament', 'Weightlifting', null, null, 140, false, false),
('1000000006', 'The uOttawa Tournament', 'Speed Skating', '00:07:24', null, null, false, false),
('1000000006', 'The uOttawa Tournament', '100m Sprint', '00:00:38', null, null, false, false),
('1000000006', 'The uOttawa Tournament', 'Weightlifting', null, null, 150, false, false),
('1000000007', 'The uOttawa Tournament', 'Speed Skating', '00:07:34', null, null, false, false),
('1000000007', 'The uOttawa Tournament', '100m Sprint', '00:00:36', null, null, false, false),
('1000000007', 'The uOttawa Tournament', 'Weightlifting', null, null, 149, false, false),
('1000000008', 'The uOttawa Tournament', 'Speed Skating', '00:08:00', null, null, false, false),
('1000000008', 'The uOttawa Tournament', '100m Sprint', '00:00:41', null, null, false, false),
('1000000008', 'The uOttawa Tournament', 'Weightlifting', null, null, 122, false, false),
('1000000009', 'The uOttawa Tournament', 'Speed Skating', '00:06:58', null, null, false, false),
('1000000009', 'The uOttawa Tournament', '100m Sprint', '00:00:27', null, null, false, false),
('1000000009', 'The uOttawa Tournament', 'Weightlifting', null, null, 158, false, false),
('1000000013', 'The uOttawa Tournament', 'Speed Skating', '00:07:22', null, null, false, false),
('1000000013', 'The uOttawa Tournament', '100m Sprint', '00:00:34', null, null, false, false),
('1000000013', 'The uOttawa Tournament', 'Weightlifting', null, null, 153, false, false),
('1000000015', 'The uOttawa Tournament', 'Speed Skating', '00:07:36', null, null, false, false),
('1000000015', 'The uOttawa Tournament', '100m Sprint', '00:00:35', null, null, false, false),
('1000000015', 'The uOttawa Tournament', 'Weightlifting', null, null, 144, false, false),
('1000000017', 'The uOttawa Tournament', 'Speed Skating', '00:21:45', null, null, false, false),
('1000000017', 'The uOttawa Tournament', '100m Sprint', '00:4:19', null, null, false, false),
('1000000017', 'The uOttawa Tournament', 'Weightlifting', null, null, 13, false, false),
('1000000018', 'The uOttawa Tournament', 'Speed Skating', '00:8:21', null, null, false, false),
('1000000018', 'The uOttawa Tournament', '100m Sprint', '00:00:35', null, null, false, false),
('1000000018', 'The uOttawa Tournament', 'Weightlifting', null, null, 142, false, false),
('1000000020', 'The uOttawa Tournament', 'Speed Skating', '00:8:13', null, null, false, false),
('1000000020', 'The uOttawa Tournament', '100m Sprint', '00:00:34', null, null, false, false),
('1000000020', 'The uOttawa Tournament', 'Weightlifting', null, null, 141, false, false),
('1000000021', 'The uOttawa Tournament', 'Speed Skating', '00:7:57', null, null, false, false),
('1000000021', 'The uOttawa Tournament', '100m Sprint', '00:00:36', null, null, false, false),
('1000000021', 'The uOttawa Tournament', 'Weightlifting', null, null, 133, false, false),
('1000000023', 'The uOttawa Tournament', 'Speed Skating', '00:7:46', null, null, false, false),
('1000000023', 'The uOttawa Tournament', '100m Sprint', '00:00:33', null, null, false, false),
('1000000023', 'The uOttawa Tournament', 'Weightlifting', null, null, 127, false, false),
('1000000024', 'The uOttawa Tournament', 'Speed Skating', '00:7:53', null, null, false, false),
('1000000024', 'The uOttawa Tournament', '100m Sprint', '00:00:29', null, null, false, false),
('1000000024', 'The uOttawa Tournament', 'Weightlifting', null, null, 114, false, false),
('1000000025', 'The uOttawa Tournament', 'Speed Skating', '00:7:58', null, null, false, false),
('1000000025', 'The uOttawa Tournament', '100m Sprint', '00:00:32', null, null, false, false),
('1000000025', 'The uOttawa Tournament', 'Weightlifting', null, null, 125, false, false),
('1000000026', 'The uOttawa Tournament', 'Speed Skating', '00:8:38', null, null, false, false),
('1000000026', 'The uOttawa Tournament', '100m Sprint', '00:00:35', null, null, false, false),
('1000000026', 'The uOttawa Tournament', 'Weightlifting', null, null, 138, false, false);


-- Adding results for the Gatineau games
INSERT INTO results(athlete_id, comp_name, event_name, time, reps, weight, tiebreaker1success, tiebreaker2success) VALUES
('1000000000', 'Jeux de Gatineau', 'Cycling', '00:32:43', null, null, false, false),
('1000000000', 'Jeux de Gatineau', 'Marathon', '01:53:33', null, null, false, false),
('1000000001', 'Jeux de Gatineau', 'Cycling', '00:33:12', null, null, false, false),
('1000000001', 'Jeux de Gatineau', 'Marathon', '01:52:41', null, null, false, false),
('1000000004', 'Jeux de Gatineau', 'Cycling', '00:33:47', null, null, false, false),
('1000000004', 'Jeux de Gatineau', 'Marathon', '01:53:47', null, null, false, false),
('1000000008', 'Jeux de Gatineau', 'Cycling', '00:31:58', null, null, false, false),
('1000000008', 'Jeux de Gatineau', 'Marathon', '01:55:43', null, null, false, false),
('1000000009', 'Jeux de Gatineau', 'Cycling', '00:29:58', null, null, false, false),
('1000000009', 'Jeux de Gatineau', 'Marathon', '01:47:23', null, null, false, false),
('1000000011', 'Jeux de Gatineau', 'Cycling', '00:32:18', null, null, false, false),
('1000000011', 'Jeux de Gatineau', 'Marathon', '01:54:03', null, null, false, false),
('1000000012', 'Jeux de Gatineau', 'Cycling', '00:30:02', null, null, false, false),
('1000000012', 'Jeux de Gatineau', 'Marathon', '01:48:16', null, null, false, false),
('1000000014', 'Jeux de Gatineau', 'Cycling', '00:31:47', null, null, false, false),
('1000000014', 'Jeux de Gatineau', 'Marathon', '01:58:31', null, null, false, false),
('1000000015', 'Jeux de Gatineau', 'Cycling', '00:32:14', null, null, false, false),
('1000000015', 'Jeux de Gatineau', 'Marathon', '01:57:19', null, null, false, false),
('1000000017', 'Jeux de Gatineau', 'Cycling', '00:59:44', null, null, false, false),
('1000000017', 'Jeux de Gatineau', 'Marathon', '03:16:23', null, null, false, false),
('1000000019', 'Jeux de Gatineau', 'Cycling', '00:33:17', null, null, false, false),
('1000000019', 'Jeux de Gatineau', 'Marathon', '01:56:53', null, null, false, false),
('1000000021', 'Jeux de Gatineau', 'Cycling', '00:34:04', null, null, false, false),
('1000000021', 'Jeux de Gatineau', 'Marathon', '01:54:43', null, null, false, false),
('1000000022', 'Jeux de Gatineau', 'Cycling', '00:33:43', null, null, false, false),
('1000000022', 'Jeux de Gatineau', 'Marathon', '01:51:18', null, null, false, false);