""" Test de list de projet """

import unittest
from webDriversOptions import wait_url
from webDriversOptions import browser_register
from webDriversOptions import browser_login
from webDriversOptions import browser_logout
from webDriversOptions import chrome_webdriver
from consts import File
from consts import Xpath

class ListProjects(unittest.TestCase):
    """ Test de classe unitaire pour la liste des projets """
    def setUp(self):
        self.chrome = chrome_webdriver()

    def test_list(self):
        """ Test l'acces a la liste des projets """
        self.assertIn(File.HOME_PAGE, self.chrome.current_url)

        browser_register(self.chrome)
        browser_login(self.chrome)

        self.chrome.find_element_by_xpath(Xpath.LIST_PROJECTS_BTN).click()
        wait_url(self.chrome, File.PROJECT_LIST)
        self.assertIn(File.PROJECT_LIST, self.chrome.current_url)

        browser_logout(self.chrome)

    def tearDown(self):
        self.chrome.quit()


if __name__ == "__main__":
    unittest.main()
