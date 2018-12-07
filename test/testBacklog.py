""" Test du backlog """

import unittest
from webDriversOptions import chromeWebdriver
from webDriversOptions import waitURL
from webDriversOptions import browserRegister
from webDriversOptions import browserLogin
from webDriversOptions import browserLogout
from webDriversOptions import browserCreateProject
from webDriversOptions import browserDeleteProject
from consts import File
from consts import Xpath

class BacklogProject(unittest.TestCase):
    """ Classe de test unitaire pour le backlog """
    __PROJECT_NAME = "projet"
    __TEST_PROJECT_ENTRY = "//a[@id='backlog-projet']"

    def setUp(self):
        self.chrome = chromeWebdriver()

    def testBacklog(self):
        """
        Test l'acces au backlog
        """
        self.chrome.get('http://php-apache:80')
        waitURL(self.chrome, File.HOME_PAGE)
        self.assertIn(File.HOME_PAGE, self.chrome.current_url)

        browserRegister(self.chrome)
        browserLogin(self.chrome)
        browserCreateProject(self.chrome, self.__PROJECT_NAME)

        self.assertIn(File.PROJECT_LIST, self.chrome.current_url)
        listHref = self.chrome.find_element_by_xpath(self.__TEST_PROJECT_ENTRY)
        listHref.click()
        self.assertIn(File.BACKLOG, self.chrome.current_url)

        self.chrome.find_element_by_xpath(Xpath.HOME_BTN).click()
        waitURL(self.chrome, File.HOME_PAGE)
        self.chrome.find_element_by_xpath(Xpath.LIST_PROJECTS_BTN).click()
        waitURL(self.chrome, File.PROJECT_LIST)
        browserDeleteProject(self.chrome, self.__PROJECT_NAME)
        browserLogout(self.chrome)

    def tearDown(self):
        self.chrome.quit()

if __name__ == "__main__":
    unittest.main()
