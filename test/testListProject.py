""" Test de list de projet """

import unittest
from webDriversOptions import waitURL
from webDriversOptions import browserRegister
from webDriversOptions import browserLogin
from webDriversOptions import browserLogout
from webDriversOptions import chromeWebdriver
from consts import File
from consts import Xpath

class ListProjects(unittest.TestCase):
    """ Test de classe unitaire pour la liste des projets """
    def setUp(self):
        self.chrome = chromeWebdriver()

    def testList(self):
        """ Test l'acces a la liste des projets """
        self.chrome.get('http://php-apache:80')
        waitURL(self.chrome, File.HOME_PAGE)
        self.assertIn(File.HOME_PAGE, self.chrome.current_url)

        browserRegister(self.chrome)
        browserLogin(self.chrome)

        self.chrome.find_element_by_xpath(Xpath.LIST_PROJECTS_BTN).click()
        waitURL(self.chrome, File.PROJECT_LIST)
        self.assertIn(File.PROJECT_LIST, self.chrome.current_url)

        browserLogout(self.chrome)

    def tearDown(self):
        self.chrome.quit()


if __name__ == "__main__":
    unittest.main()
